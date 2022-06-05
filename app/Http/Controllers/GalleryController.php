<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GallerySubtitle;
use App\Models\GalleryPhoto;

class GalleryController extends Controller
{
    public function index() {

        $dataAry = GallerySubtitle::orderBy('order')->get();

        $header = '作品集錦-管理';
        $slot = '';

        return view('mumu.photo.photo', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = '作品集錦-管理';
        $slot = '';
        return view('mumu.photo.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        $get_sub = GallerySubtitle::create([
            'subtitle' => $req->photo_subtitle,
            'category' => $req->photo_category,
            'order' => GallerySubtitle::count(),
        ]);

        if($req->hasfile('second_img')){
            foreach ($req->second_img as $key => $value) {
                $path = FilesController::imgUpload($value, 'photo');
                GalleryPhoto::create([
                    'img' => $path,
                    'subtitle_id' => $get_sub->id,
                ]);
            }
        }

        return redirect('/photo');
    }
    public function delete($target){

        $targetObj = GallerySubtitle::find($target);

        $imgAry = GalleryPhoto::where('subtitle_id', $target)->get();
        foreach ($imgAry as $key => $value) {
            FilesController::deleteUpload($value->img);
            $value->delete();
        }

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

        return redirect('/photo');
    }
    public function edit($target) {
        $myedit = GallerySubtitle::find($target);
        $header = '作品集錦-管理';
        $slot = '';
        return view('mumu.photo.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = GallerySubtitle::find($target);

        $targetObj->subtitle = $req->photo_subtitle;
        $targetObj->category = $req->photo_category;
        $targetObj->save();

        if($req->hasfile('second_img')){
            foreach ($req->second_img as $key => $value) {
                $path = FilesController::imgUpload($value, 'photo');
                GalleryPhoto::create([
                    'img' => $path,
                    'subtitle_id' => $target,
                ]);
            }
        }

        return redirect('/photo');
    }

    public function del_secimg_func($sec_tar){
        $tarimg = GalleryPhoto::find($sec_tar);
        $subtit_id = $tarimg -> subtitle_id;

        FilesController::deleteUpload($tarimg->img);
        $tarimg->delete();

        return redirect('/photo/edit/'.$subtit_id);
    }

    public function mystore($target, Request $req) {

        // // dd($req->all());

        // $targetObj = Product::find($target);
        // $targetObj->name = $req->mycontent;
        // $targetObj->save();

        // // Response只能接JSON的格式
        // $result = [
        //     'new_name' => $req->mycontent,
        // ];
        // return $result;
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

        return redirect('/photo');
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

        return redirect('/photo');

    }
}
