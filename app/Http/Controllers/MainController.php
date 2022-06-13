<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

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
use App\Models\User;

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

        $galAry_all = [$galAry_1, $galAry_2, $galAry_3];

        $galAry_org = GallerySubtitle::orderBy('category')->orderBy('order')->get();

        return view('mumu.gallery', compact('galAry_all', 'galAry_org'));
    }

    public function health() {

        $healthAry = Info::orderBy('category')->take(3)->get();

        return view('mumu.health', compact('healthAry'));
    }

    public function appointment() {

        $appoAry = Notice::take(2)->get();

        return view('mumu.appointment', compact('appoAry'));
    }

    public function changePassword(){

        $header = '變更密碼';
        $slot = '';
        return view('mumu.pwd', compact('header', 'slot'));
    }

    public function updatePassword(Request $req){

        // 驗證輸入資料
        $req->validate([
            'old_password' => 'required',
            'new_password' => ['required', 'confirmed', 'min:6'],
            // 'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 確認與舊密碼相符
        if (!Hash::check($req->old_password, auth()->user()->password)) {
            return back()->with('error', '舊密碼不正確');
        }

        // 更新密碼
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($req->new_password),
        ]);

        return back()->with('status', '密碼變更成功！');
    }
}
