<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index() {
        // Test
        $dataAry = Faq::orderBy('order')->get();

        $header = 'FAQ管理';
        $slot = '';

        return view('mumu.faq.faq', compact('dataAry', 'header', 'slot'));
    }
    public function create(){
        $header = 'FAQ管理';
        $slot = '';
        return view('mumu.faq.create',compact('header', 'slot'));
    }
    public function store(Request $req){
        Faq::create([
            'question' => $req->ques,
            'answer' => $req->ans,
            'order' => Faq::count(),
        ]);

        return redirect('/faq');
    }
    public function delete($target){
        $targetObj = Faq::find($target);

        // ------ 後面的oreder往前移1 ------
        $tarOrd = $targetObj->order;
        $ordAry = Faq::orderBy('order')->get();

        for ($i = $tarOrd + 1; $i < Faq::count(); $i++) {
            $ordAry[$i]->order -= 1;
            $ordAry[$i]->save();
        }
        // ------ End ------

        $targetObj->delete();

        return redirect('/faq');
    }
    public function edit($target) {
        $myedit = Faq::find($target);
        $header = 'FAQ管理';
        $slot = '';
        return view('mumu.faq.edit', compact('myedit', 'header', 'slot'));
    }

    public function update($target, Request $req) {
        $targetObj = Faq::find($target);

        $targetObj->question = $req->ques;
        $targetObj->answer = $req->ans;
        $targetObj->save();

        return redirect('/faq');
    }
    public function upmove($target) {

        // 取得目標obj
        $tarObj = Faq::find($target);
        // 若已經是最上面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == 0) {
            $result = [
                'pos' => 'upmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = Faq::orderBy('order')->get();
        // 找到前一個obj，
        $prevObj = $ordAry[$tarOrd-1];
        // Swap order
        $tarObj -> order -= 1;
        $prevObj -> order += 1;
        // Save
        $tarObj->save();
        $prevObj->save();

        return redirect('/faq');
    }
    public function downmove($target) {

        // 取得目標obj
        $tarObj = Faq::find($target);
        // 取得max_index
        $max_index = Faq::count()-1;
        // 若已經是最下面，直接return
        $tarOrd = $tarObj->order;
        if ($tarOrd == $max_index) {
            $result = [
                'pos' => 'downmax',
            ];
            return $result;
        }
        // 依order小到大
        $ordAry = Faq::orderBy('order')->get();
        // 找到後一個obj，
        $postObj = $ordAry[$tarOrd+1];
        // Swap order
        $tarObj -> order += 1;
        $postObj -> order -= 1;
        // Save
        $tarObj->save();
        $postObj->save();

        return redirect('/faq');

    }
}
