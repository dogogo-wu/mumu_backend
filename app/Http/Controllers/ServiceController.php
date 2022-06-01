<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index() {
        $dataAry = Service::orderBy('order')->get();

        $header = '服務項目-管理';
        $slot = '';

        return view('mumu.myservice.service', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = '服務項目管理';
        $slot = '';
        return view('mumu.myservice.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        $path = FilesController::imgUpload($req->service_img, 'service');

        Service::create([
            'img' => $path,
            'title' => $req->service_title,
            'content' => $req->service_content,
            'order' => Service::count(),
        ]);

        return redirect('/service');
    }
    public function delete($target){
        $targetObj = Service::find($target);

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $targetObj->order;
        $ordAry = Service::orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < Service::count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        FilesController::deleteUpload($targetObj->img);
        $targetObj->delete();

        return redirect('/service');
    }
    public function edit($target) {
        $myedit = Service::find($target);
        $header = '服務項目管理';
        $slot = '';
        return view('mumu.myservice.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = Service::find($target);

        if($req->hasfile('service_img')){
            $path = FilesController::imgUpload($req->service_img, 'service');
            FilesController::deleteUpload($targetObj->img);
            $targetObj->img = $path;
        }

        $targetObj->title = $req->service_title;
        $targetObj->content = $req->service_content;
        $targetObj->save();

        return redirect('/service');
    }
    public function upmove($target) {

        // 取得目標obj
        $tarObj = Service::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            return;
        }
        // 依order小到大
        $ordAry = Service::orderBy('order')->get();
        // 找到前一個obj，
        $prevObj = $ordAry[$tarOrd-1];
        // Swap order
        $tarObj -> order -= 1;
        $prevObj -> order += 1;
        // Save
        $tarObj->save();
        $prevObj->save();

        return redirect('/service');
    }
    public function downmove($target) {

        // 取得目標obj
        $tarObj = Service::find($target);
        // 取得max_index
        $max_index = Service::count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            return;
        }
        // 依order小到大
        $ordAry = Service::orderBy('order')->get();
        // 找到後一個obj，
        $postObj = $ordAry[$tarOrd+1];
        // Swap order
        $tarObj -> order += 1;
        $postObj -> order -= 1;
        // Save
        $tarObj->save();
        $postObj->save();

        return redirect('/service');

    }
}
