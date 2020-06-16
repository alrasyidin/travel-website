<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;

class DetailController extends Controller
{
    public function index($slug)
    {
        $detail = TravelPackage::with(['galleries'])
                ->where('slug', $slug)
                ->firstorFail();

        return view('pages.detail', compact('detail'));
    }
}
