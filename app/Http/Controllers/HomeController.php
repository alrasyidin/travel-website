<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;

class HomeController extends Controller
{
    public function index() {
        $packages = TravelPackage::with(['galleries'])->get();

        return view('pages.home', compact('packages'));
    }
}
