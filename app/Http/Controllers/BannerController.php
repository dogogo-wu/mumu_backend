<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index() {
        // Test
        $dataAry = Banner::orderBy('order')->get();

        // $dataAry = Banner::get();
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

        Banner::create([
            'img' => $path,
            'remark' => $req->banner_remark,
            'order' => Banner::count(),
        ]);

        return redirect('/banner');
    }
    public function delete($target){
        $targetObj = Banner::find($target);

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $targetObj->order;
        $ordAry = Banner::orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < Banner::count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        FilesController::deleteUpload($targetObj->img);
        $targetObj->delete();

        return redirect('/banner');
    }
    public function edit($target) {
        $myedit = Banner::find($target);
        $header = 'Banner管理';
        $slot = '';
        return view('mumu.banner.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = Banner::find($target);

        if($req->hasfile('banner_img')){
            $path = FilesController::imgUpload($req->banner_img, 'banner');
            FilesController::deleteUpload($targetObj->img);
            $targetObj->img = $path;
        }

        $targetObj->remark = $req->banner_remark;
        $targetObj->save();

        return redirect('/banner');
    }
    // public function move(Request $req) {

    //     // 找到2個目標物件
    //     $tarObj1 = Banner::find($req->temp1);
    //     $tarObj2 = Banner::find($req->temp2);

    //     // 取目標物件的order
    //     $tarOrd1 = $tarObj1->order;
    //     $tarOrd2 = $tarObj2->order;

    //     // 做交換 (swap)
    //     $tmp = $tarOrd1;
    //     $tarOrd1 = $tarOrd2;
    //     $tarOrd2 = $tmp;

    //     // 把值存回去
    //     $tarObj1->order = $tarOrd1;
    //     $tarObj2->order = $tarOrd2;

    //     // Save
    //     $tarObj1->save();
    //     $tarObj2->save();

    //     return;
    // }


    public function upmove($target) {

        // 取得目標obj
        $tarObj = Banner::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            $result = [
                'pos' => 'upmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = Banner::orderBy('order')->get();
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
        $tarObj = Banner::find($target);
        // 取得max_index
        $max_index = Banner::count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            $result = [
                'pos' => 'downmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = Banner::orderBy('order')->get();
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
