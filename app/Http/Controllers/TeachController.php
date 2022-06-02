<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teach;

class TeachController extends Controller
{
    public function index() {
        $dataAry = Teach::orderBy('order')->get();

        $header = '創業教學-管理';
        $slot = '';

        return view('mumu.teach.teach', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = '創業教學管理';
        $slot = '';
        return view('mumu.teach.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        $path = FilesController::imgUpload($req->teach_img, 'teach');

        Teach::create([
            'img' => $path,
            'title' => $req->teach_title,
            'content' => $req->teach_content,
            'order' => Teach::count(),
        ]);

        return redirect('/teach');
    }
    public function delete($target){
        $targetObj = Teach::find($target);

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $targetObj->order;
        $ordAry = Teach::orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < Teach::count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        FilesController::deleteUpload($targetObj->img);
        $targetObj->delete();

        return redirect('/teach');
    }
    public function edit($target) {
        $myedit = Teach::find($target);
        $header = '創業教學管理';
        $slot = '';
        return view('mumu.teach.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = Teach::find($target);

        if($req->hasfile('teach_img')){
            $path = FilesController::imgUpload($req->teach_img, 'teach');
            FilesController::deleteUpload($targetObj->img);
            $targetObj->img = $path;
        }

        $targetObj->title = $req->teach_title;
        $targetObj->content = $req->teach_content;
        $targetObj->save();

        return redirect('/teach');
    }
    public function upmove($target) {

        // 取得目標obj
        $tarObj = Teach::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            return;
        }
        // 依order小到大
        $ordAry = Teach::orderBy('order')->get();
        // 找到前一個obj，
        $prevObj = $ordAry[$tarOrd-1];
        // Swap order
        $tarObj -> order -= 1;
        $prevObj -> order += 1;
        // Save
        $tarObj->save();
        $prevObj->save();

        return redirect('/teach');
    }
    public function downmove($target) {

        // 取得目標obj
        $tarObj = Teach::find($target);
        // 取得max_index
        $max_index = Teach::count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            return;
        }
        // 依order小到大
        $ordAry = Teach::orderBy('order')->get();
        // 找到後一個obj，
        $postObj = $ordAry[$tarOrd+1];
        // Swap order
        $tarObj -> order += 1;
        $postObj -> order -= 1;
        // Save
        $tarObj->save();
        $postObj->save();

        return redirect('/teach');

    }
}
