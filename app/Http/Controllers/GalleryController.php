<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GallerySubtitle;
use App\Models\GalleryPhoto;

class GalleryController extends Controller
{
    public function index() {

        $dataAry = GallerySubtitle::orderBy('category')->orderBy('order')->get();

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
            'order' => GallerySubtitle::where('category', $req->photo_category)->count(),
        ]);

        if($req->hasfile('second_img')){
            foreach ($req->second_img as $key => $value) {
                $path = FilesController::imgUpload($value, 'photo');
                GalleryPhoto::create([
                    'img' => $path,
                    'subtitle_id' => $get_sub->id,
                    'order' => GalleryPhoto::where('subtitle_id', $get_sub->id)->count(),
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
        $ordAry = GallerySubtitle::where('category', $targetObj->category)->orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < GallerySubtitle::where('category', $targetObj->category)->count(); $i++) {
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
        $myimg = GalleryPhoto::where('subtitle_id', $target)->orderBy('order')->get();
        $header = '作品集錦-管理';
        $slot = '';
        return view('mumu.photo.edit', compact('myedit', 'myimg', 'header', 'slot'));
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

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $tarimg->order;
        $ordAry = GalleryPhoto::where('subtitle_id', $subtit_id)->orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < GalleryPhoto::where('subtitle_id', $subtit_id)->count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        FilesController::deleteUpload($tarimg->img);
        $tarimg->delete();

        return redirect('/photo/edit/'.$subtit_id);
    }

    public function mystore($target, Request $req) {

        $targetObj = GallerySubtitle::find($target);

        // 若類別變動，需調整順序
        if ($targetObj->category != $req->photo_category) {
            // ------ 後面的oreder往前移1 ------
            $tarOrd = $targetObj->order;
            $ordAry = GallerySubtitle::where('category', $targetObj->category)->orderBy('order')->get();

            for ($i = $tarOrd + 1; $i < GallerySubtitle::where('category', $targetObj->category)->count(); $i++) {
                $ordAry[$i]->order -= 1;
                $ordAry[$i]->save();
            }
            // ------ End ------
            $targetObj->order = GallerySubtitle::where('category', $req->photo_category)->count();
        }

        $targetObj->subtitle = $req->photo_subtitle;
        $targetObj->category = $req->photo_category;
        $targetObj->save();

        return;
    }

    public function upmove($target) {

        // 取得目標obj
        $tarObj = GallerySubtitle::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            $result = [
                'pos' => 'upmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = GallerySubtitle::where('category', $tarObj->category)->orderBy('order')->get();
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
        $max_index = GallerySubtitle::where('category', $tarObj->category)->count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            $result = [
                'pos' => 'downmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = GallerySubtitle::where('category', $tarObj->category)->orderBy('order')->get();
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
    public function frontmove($target) {

        // 取得目標obj
        $tarObj = GalleryPhoto::find($target);
        $subtit_id = $tarObj->subtitle_id;
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            $result = [
                'pos' => 'frontmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = GalleryPhoto::where('subtitle_id', $subtit_id)->orderBy('order')->get();
        // 找到前一個obj，
        $prevObj = $ordAry[$tarOrd-1];
        // Swap order
        $tarObj -> order -= 1;
        $prevObj -> order += 1;
        // Save
        $tarObj->save();
        $prevObj->save();

        return redirect('/photo/edit/' .$subtit_id);
    }
    public function backmove($target) {

        // 取得目標obj
        $tarObj = GalleryPhoto::find($target);
        $subtit_id = $tarObj->subtitle_id;
        // 取得max_index
        $max_index = GalleryPhoto::where('subtitle_id', $subtit_id)->count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            $result = [
                'pos' => 'backmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = GalleryPhoto::where('subtitle_id', $subtit_id)->orderBy('order')->get();
        // 找到後一個obj，
        $postObj = $ordAry[$tarOrd+1];
        // Swap order
        $tarObj -> order += 1;
        $postObj -> order -= 1;
        // Save
        $tarObj->save();
        $postObj->save();

        return redirect('/photo/edit/' .$subtit_id);

    }

}
