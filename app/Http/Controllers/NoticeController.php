<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index() {

        $dataAry = Notice::get();

        $header = '預約注意事項-管理';
        $slot = '';

        return view('mumu.notice.notice', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = '預約注意事項-管理';
        $slot = '';
        return view('mumu.notice.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        // 轉換為<p>
        $new_content = NoticeController::textTransP($req->content);

        Notice::create([
            'subtitle' => $req->subtitle,
            'content' => $new_content,
        ]);


        return redirect('/notice');
    }
    public function delete($target){
        $targetObj = Notice::find($target);

        $targetObj->delete();

        return redirect('/notice');
    }
    public function edit($target) {
        $myedit = Notice::find($target);
        $header = '預約注意事項-管理';
        $slot = '';
        return view('mumu.notice.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = Notice::find($target);

        // 轉換為<p>
        $new_content = NoticeController::textTransP($req->content);

        $targetObj->subtitle = $req->subtitle;
        $targetObj->content = $new_content;
        $targetObj->save();

        return redirect('/notice');
    }

    public function textTransP($intxt){
        $outxt = '<p>'. str_replace(array("\r\n","\n"),'</p><p>', $intxt) . '</p>';

        return $outxt;
    }
}
