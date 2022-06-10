<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Latest;
use App\Models\Service;
use App\Models\Faq;
use App\Models\Teach;
use App\Models\TeachPic;

class MainController extends Controller
{
    public function index() {

        // Banner
        $banAry = Banner::orderBy('order')->get();

        // 最新消息
        $newsAry = Latest::orderBy('order')->get();

        // 服務項目
        $servAry = Service::orderBy('order')->get();

        // FAQ
        $faqAry = Faq::orderBy('order')->get();

        return view('mumu.index', compact('banAry', 'newsAry', 'servAry', 'faqAry'));
    }
    public function course() {

        // 教學卡片
        $itemAry = Teach::orderBy('order')->get();

        // 教學花絮照片
        $picAry = TeachPic::orderBy('order')->get();

        return view('mumu.course', compact('itemAry', 'picAry'));
    }

}
