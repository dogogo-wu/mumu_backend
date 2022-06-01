<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Environment;

class EnvironmentController extends Controller
{
    public function index() {
        // Test
        $dataAry = Environment::orderBy('order')->get();

        // $dataAry = Environment::get();
        $header = '環境照管理';
        $slot = '';

        return view('mumu.myenv.environment', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = '環境照管理';
        $slot = '';
        return view('mumu.myenv.create',compact('header', 'slot'));
    }
    public function store(Request $req){

        $path = FilesController::imgUpload($req->env_img, 'environment');

        Environment::create([
            'img' => $path,
            'remark' => $req->env_remark,
            'order' => Environment::count(),
        ]);

        return redirect('/environment');
    }
    public function delete($target){
        $targetObj = Environment::find($target);

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $targetObj->order;
        $ordAry = Environment::orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < Environment::count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        FilesController::deleteUpload($targetObj->img);
        $targetObj->delete();

        return redirect('/environment');
    }
    public function edit($target) {
        $myedit = Environment::find($target);
        $header = '環境照管理';
        $slot = '';
        return view('mumu.myenv.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = Environment::find($target);

        if($req->hasfile('env_img')){
            $path = FilesController::imgUpload($req->env_img, 'environment');
            FilesController::deleteUpload($targetObj->img);
            $targetObj->img = $path;
        }

        $targetObj->remark = $req->env_remark;
        $targetObj->save();

        return redirect('/environment');
    }
    public function upmove($target) {

        // 取得目標obj
        $tarObj = Environment::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            return;
        }
        // 依order小到大
        $ordAry = Environment::orderBy('order')->get();
        // 找到前一個obj，
        $prevObj = $ordAry[$tarOrd-1];
        // Swap order
        $tarObj -> order -= 1;
        $prevObj -> order += 1;
        // Save
        $tarObj->save();
        $prevObj->save();

        return redirect('/environment');
    }
    public function downmove($target) {

        // 取得目標obj
        $tarObj = Environment::find($target);
        // 取得max_index
        $max_index = Environment::count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            return;
        }
        // 依order小到大
        $ordAry = Environment::orderBy('order')->get();
        // 找到後一個obj，
        $postObj = $ordAry[$tarOrd+1];
        // Swap order
        $tarObj -> order += 1;
        $postObj -> order -= 1;
        // Save
        $tarObj->save();
        $postObj->save();

        return redirect('/environment');

    }
}
