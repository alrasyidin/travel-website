<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\TravelPackage;

class DashboardController extends Controller
{
    public function index(){
        // Transaction::with('detail')

        return view('pages.admin.dashboard', [
            'travel_package' => TravelPackage::count(),
            'transaction_total' => Transaction::count(),
            'transaction_total_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transaction_total_success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
        ]);
    }
}
