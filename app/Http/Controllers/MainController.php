<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Environment;

class MainController extends Controller
{
    public function index() {

        // $mydataAry = DB::table('news')->orderBy('id', 'desc')->take(3)->get();
        // $mydataAry = DB::table('news')->take(3)->get();
        // $mydataAry = DB::table('news')->inRandomOrder()->take(3)->get();

        $banAry = Banner::orderBy('order')->get();
        $newsAry = Environment::orderBy('order')->get();

        return view('mumu.index', compact('banAry', 'newsAry'));
    }

}
