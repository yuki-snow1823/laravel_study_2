<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{
    // モデルを指定しなくても同じ名前にするだけで、インスタンスが入る
    public function index($nandemoii)
    {
        $data = [
        'msg'=>$nandemoii,
        "name" => config("app.name")
        ];
        return view('hello.index', $data);
    }



    public function other(Request $request)
    {
        // middlewareの設定したものを呼び出している
        $data = [
            'msg'=>$request->bye,
        ];
        return view('hello.index', $data);
    }
}
