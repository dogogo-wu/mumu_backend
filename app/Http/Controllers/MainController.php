<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Latest;
use App\Models\Service;
use App\Models\Faq;
use App\Models\Teach;
use App\Models\TeachPic;
use App\Models\GallerySubtitle;
use App\Models\GalleryPhoto;
use App\Models\Info;
use App\Models\Notice;

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

    public function gallery() {

        $galAry_1 = GallerySubtitle::where('category', 1)->orderBy('order')->get();
        $galAry_2 = GallerySubtitle::where('category', 2)->orderBy('order')->get();
        $galAry_3 = GallerySubtitle::where('category', 3)->orderBy('order')->get();

        return view('mumu.gallery', compact('galAry_1', 'galAry_2', 'galAry_3'));
    }

    public function health() {

        $healthAry = Info::orderBy('category')->take(3)->get();

        return view('mumu.health', compact('healthAry'));
    }

    public function appointment() {

        $appoAry = Notice::take(2)->get();

        return view('mumu.appointment', compact('appoAry'));
    }
}
