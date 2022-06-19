<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latest;

class LatestController extends Controller
{
    public function index() {
        $dataAry = Latest::orderBy('order')->get();

        $header = '最新消息-管理';
        $slot = '';

        return view('mumu.latest.latest', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = '最新消息-管理';
        $slot = '';
        return view('mumu.latest.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        $path = FilesController::imgUpload($req->img, 'latest');

        // ------ 原本ary的oreder往後移1 ------
        $ordAry = Latest::orderBy('order')->get();

        for ($i = 0; $i < Latest::count(); $i++) {
            $ordAry[$i]->order += 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        Latest::create([
            'img' => $path,
            'remark' => $req->remark,
            'order' => 0,
        ]);

        return redirect('/latest');
    }
    public function delete($target){
        $targetObj = Latest::find($target);

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $targetObj->order;
        $ordAry = Latest::orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < Latest::count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        FilesController::deleteUpload($targetObj->img);
        $targetObj->delete();

        return redirect('/latest');
    }
    public function edit($target) {
        $myedit = Latest::find($target);
        $header = '最新消息-管理';
        $slot = '';
        return view('mumu.latest.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = Latest::find($target);

        if($req->hasfile('img')){
            $path = FilesController::imgUpload($req->img, 'latest');
            FilesController::deleteUpload($targetObj->img);
            $targetObj->img = $path;
        }

        $targetObj->remark = $req->remark;
        $targetObj->save();

        return redirect('/latest');
    }
    public function upmove($target) {

        // 取得目標obj
        $tarObj = Latest::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            $result = [
                'pos' => 'upmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = Latest::orderBy('order')->get();
        // 找到前一個obj，
        $prevObj = $ordAry[$tarOrd-1];
        // Swap order
        $tarObj -> order -= 1;
        $prevObj -> order += 1;
        // Save
        $tarObj->save();
        $prevObj->save();

        return;
    }
    public function downmove($target) {

        // 取得目標obj
        $tarObj = Latest::find($target);
        // 取得max_index
        $max_index = Latest::count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            $result = [
                'pos' => 'downmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = Latest::orderBy('order')->get();
        // 找到後一個obj，
        $postObj = $ordAry[$tarOrd+1];
        // Swap order
        $tarObj -> order += 1;
        $postObj -> order -= 1;
        // Save
        $tarObj->save();
        $postObj->save();

        return;

    }
}
