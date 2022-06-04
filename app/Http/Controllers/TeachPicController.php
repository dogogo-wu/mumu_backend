<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachPic;

class TeachPicController extends Controller
{
    public function index() {
        $dataAry = TeachPic::orderBy('order')->get();

        $header = '教學花絮-管理';
        $slot = '';

        return view('mumu.teach_pic.teach_pic', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = '教學花絮-管理';
        $slot = '';
        return view('mumu.teach_pic.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        $path = FilesController::imgUpload($req->teach_pic_img, 'teach_pic');

        TeachPic::create([
            'img' => $path,
            'remark' => $req->teach_pic_remark,
            'order' => TeachPic::count(),
        ]);

        return redirect('/teach_pic');
    }
    public function delete($target){
        $targetObj = TeachPic::find($target);

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $targetObj->order;
        $ordAry = TeachPic::orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < TeachPic::count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        FilesController::deleteUpload($targetObj->img);
        $targetObj->delete();

        return redirect('/teach_pic');
    }
    public function edit($target) {
        $myedit = TeachPic::find($target);
        $header = '教學花絮-管理';
        $slot = '';
        return view('mumu.teach_pic.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = TeachPic::find($target);

        if($req->hasfile('teach_pic_img')){
            $path = FilesController::imgUpload($req->teach_pic_img, 'teach_pic');
            FilesController::deleteUpload($targetObj->img);
            $targetObj->img = $path;
        }

        $targetObj->remark = $req->teach_pic_remark;
        $targetObj->save();

        return redirect('/teach_pic');
    }
    public function upmove($target) {

        // 取得目標obj
        $tarObj = TeachPic::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            return;
        }
        // 依order小到大
        $ordAry = TeachPic::orderBy('order')->get();
        // 找到前一個obj，
        $prevObj = $ordAry[$tarOrd-1];
        // Swap order
        $tarObj -> order -= 1;
        $prevObj -> order += 1;
        // Save
        $tarObj->save();
        $prevObj->save();

        return redirect('/teach_pic');
    }
    public function downmove($target) {

        // 取得目標obj
        $tarObj = TeachPic::find($target);
        // 取得max_index
        $max_index = TeachPic::count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            return;
        }
        // 依order小到大
        $ordAry = TeachPic::orderBy('order')->get();
        // 找到後一個obj，
        $postObj = $ordAry[$tarOrd+1];
        // Swap order
        $tarObj -> order += 1;
        $postObj -> order -= 1;
        // Save
        $tarObj->save();
        $postObj->save();

        return redirect('/teach_pic');

    }
}
