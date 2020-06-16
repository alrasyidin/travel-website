<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Transaction;
use App\Mail\TransactionSuccess;
use Midtrans\Config;
use Midtrans\Notification;


class MidtransController extends Controller
{
    public function notificationHandler(Request $request) {
        // set config midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // buat instance midtrans notification
        $notification = new Notification();

        // assign variables
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = explode('-',$notification->order_id);

        // cari transaksi berdasarkan id
        $transaction = Transaction::findOrFail($order_id[1]);
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if($fraud == 'challenge'){
                    $transaction->transaction_status = 'CHALLENGE';
                } else {
                    $transaction->transaction_status = 'SUCCESS';
                }
            }
        }
        else if ($status == 'settlement') {
            $transaction->transaction_status = 'SUCCESS';
        }
        else if ($status == 'pending') {
            $transaction->transaction_status = 'PENDING';
        }
        else if ($status == 'deny') {
            $transaction->transaction_status = 'FAILED';
        }
        else if ($status == 'expire') {
            $transaction->transaction_status = 'FAILED';
        }
        else if ($status == 'cancel') {
            $transaction->transaction_status = 'CANCEL';
        }

        $transaction->save();

        // Kirim Email;
        if ($transaction) {
            if ($status == 'capture' && $fraud == 'accept') {
                Mail::to($transaction->user->email)->send(
                    new TransactionSuccess($transaction)
                );
            }
            else if ($status == 'settlement') {
                Mail::to($transaction->user->email)->send(
                    new TransactionSuccess($transaction)
                );
            }
            else if ($status == 'success') {
                Mail::to($transaction->user->email)->send(
                    new TransactionSuccess($transaction)
                );

            }
            else if ($status == 'capture' && $fraud == 'challenge') {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans payment challenge'
                    ]
                ]);
            }
            else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans payment not settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification success'
                ]
            ]);
        }
    }

    public function finishRedirect() {
        return view('pages.success');
    }

    public function unfinishRedirect() {
        return view('pages.unfinish');
    }

    public function errorRedirect() {
        return view('pages.failed');
    }
}
