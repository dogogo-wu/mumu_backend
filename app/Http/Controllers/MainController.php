<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Latest;
use App\Models\Service;

class MainController extends Controller
{
    public function index() {

        // $mydataAry = DB::table('news')->orderBy('id', 'desc')->take(3)->get();
        // $mydataAry = DB::table('news')->take(3)->get();
        // $mydataAry = DB::table('news')->inRandomOrder()->take(3)->get();

        $banAry = Banner::orderBy('order')->get();
        $newsAry = Latest::orderBy('order')->get();
        $servAry = Service::orderBy('order')->get();

        return view('mumu.index', compact('banAry', 'newsAry', 'servAry'));
    }

}
