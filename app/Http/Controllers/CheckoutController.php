<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
use App\User;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $transaction = Transaction::with(['detail', 'travel_package', 'user'])->findOrFail($id);
        $detailUser = [];

        foreach ($transaction->detail as $detail) {
            $detailUser[] = User::where('username', $detail->username)->first('name');
        }

        return view('pages.checkout', compact('transaction', 'detailUser'));
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_package_id' => $id,
            'user_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART',
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $transactionDetail = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['detail', 'travel_package'])->findOrFail($transactionDetail->transaction_id);

        if ($transactionDetail->is_visa) {
            $transaction->transaction_total -= 1200000;
            $transaction->additional_visa -= 1200000;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();

        $transactionDetail->delete();

        return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'nationality' => 'required',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->findOrFail($id);

        if ($request->is_visa) {
            $transaction->transaction_total += 1200000;
            $transaction->additional_visa += 1200000;
        }

        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout', $transaction->id);
    }

    public function success(Request $request, $id){
        $transaction = Transaction::with(['detail', 'travel_package.galleries', 'user'])->find($id);

        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        // set config midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'MIDTRANS-' . $transaction->id,
                'gross_amount' => $transaction->transaction_total
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'enabled_payments' => ['gopay', 'echannel', 'indomaret', 'telkomsel_cash', 'bca_va', 'alfamart'],
            'vt-web' => [],
        ];

        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;

            // redirect ke halaman midtrans
            header('Location: ' . $paymentUrl);
        } catch (Exception $error) {
            echo $error->getMessage();
        }

        // return $transaction;

        // Mail::to($transaction->user)->send(
        //     new TransactionSuccess($transaction)
        // );

        // return view('pages.success');
    }
}
