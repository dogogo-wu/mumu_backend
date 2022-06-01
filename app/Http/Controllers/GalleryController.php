<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GallerySubtitle;
use App\Models\GalleryPhoto;

class GalleryController extends Controller
{
    public function index() {
        // Test
        $dataAry = GallerySubtitle::orderBy('order')->get();

        // $dataAry = GallerySubtitle::get();
        $header = 'Banner管理';
        $slot = '';

        return view('mumu.banner.banner', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = 'Banner管理';
        $slot = '';
        return view('mumu.banner.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        $path = FilesController::imgUpload($req->banner_img, 'banner');

        GallerySubtitle::create([
            'img' => $path,
            'remark' => $req->banner_remark,
            'order' => GallerySubtitle::count(),
        ]);

        return redirect('/banner');
    }
    public function delete($target){
        $targetObj = GallerySubtitle::find($target);

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $targetObj->order;
        $ordAry = GallerySubtitle::orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < GallerySubtitle::count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        FilesController::deleteUpload($targetObj->img);
        $targetObj->delete();

        return redirect('/banner');
    }
    public function edit($target) {
        $myedit = GallerySubtitle::find($target);
        $header = 'Banner管理';
        $slot = '';
        return view('mumu.banner.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = GallerySubtitle::find($target);

        if($req->hasfile('banner_img')){
            $path = FilesController::imgUpload($req->banner_img, 'banner');
            FilesController::deleteUpload($targetObj->img);
            $targetObj->img = $path;
        }

        $targetObj->remark = $req->banner_remark;
        $targetObj->save();

        return redirect('/banner');
    }
    public function upmove($target) {

        // 取得目標obj
        $tarObj = GallerySubtitle::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            return;
        }
        // 依order小到大
        $ordAry = GallerySubtitle::orderBy('order')->get();
        // 找到前一個obj，
        $prevObj = $ordAry[$tarOrd-1];
        // Swap order
        $tarObj -> order -= 1;
        $prevObj -> order += 1;
        // Save
        $tarObj->save();
        $prevObj->save();

        return redirect('/banner');
    }
    public function downmove($target) {

        // 取得目標obj
        $tarObj = GallerySubtitle::find($target);
        // 取得max_index
        $max_index = GallerySubtitle::count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            return;
        }
        // 依order小到大
        $ordAry = GallerySubtitle::orderBy('order')->get();
        // 找到後一個obj，
        $postObj = $ordAry[$tarOrd+1];
        // Swap order
        $tarObj -> order += 1;
        $postObj -> order -= 1;
        // Save
        $tarObj->save();
        $postObj->save();

        return redirect('/banner');

    }
}
