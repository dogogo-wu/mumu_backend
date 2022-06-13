<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    public function index() {

        $dataAry = Info::orderBy('category')->get();

        $header = '衛教資訊-管理';
        $slot = '';

        return view('mumu.info.info', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = '衛教資訊-管理';
        $slot = '';
        return view('mumu.info.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        // 轉換為<p>
        $new_describe = InfoController::textTransP($req->describe);

        // 轉換為<li>
        $new_pre = InfoController::textTransLi($req->pre);
        $new_care = InfoController::textTransLi($req->care);

        // 轉換為文字標題
        $new_tit = InfoController::cateToTitle($req->category);

        Info::create([
            'category' => $req->category,
            'title' => $new_tit,
            'describe' => $new_describe,
            'pre' => $new_pre,
            'care' => $new_care,
        ]);


        return redirect('/info');
    }
    public function delete($target){
        $targetObj = Info::find($target);

        $targetObj->delete();

        return redirect('/info');
    }
    public function edit($target) {
        $myedit = Info::find($target);
        $header = '衛教資訊-管理';
        $slot = '';
        return view('mumu.info.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = Info::find($target);

        // 轉換為<p>
        $new_describe = InfoController::textTransP($req->describe);

        // 轉換為<li>
        $new_pre = InfoController::textTransLi($req->pre);
        $new_care = InfoController::textTransLi($req->care);

        $targetObj->category = $req->category;
        $targetObj->title = InfoController::cateToTitle($req->category);
        $targetObj->describe = $new_describe;
        $targetObj->pre = $new_pre;
        $targetObj->care = $new_care;
        $targetObj->save();

        return redirect('/info');
    }

    public function textTransP($intxt){
        $outxt = '<p>'. str_replace(array("\r\n","\n"),'</p><p>', $intxt) . '</p>';

        return $outxt;
    }
    public function textTransLi($intxt){
        $outxt = '<li>'. str_replace(array("\r\n","\n"),'</li><li>', $intxt) . '</li>';

        return $outxt;
    }

    public function cateToTitle($cate){
        if ($cate == 1) {
            return '紋繡';
        }elseif ($cate == 2) {
            return '美睫';
        }elseif ($cate == 3) {
            return '皮膚管理';
        }
    }
}
