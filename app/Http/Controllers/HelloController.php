<?php
namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;

class HelloController extends Controller
{
    function __construct()
    {
        config(['sample.message'=>'新しいメッセージ！']);
    }


    public function index()
    {
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');
        $data = [
            'msg'=> $sample_msg,
            'data'=> $sample_data
        ];
        return view('hello.index', $data);
    }


    public function other(Request $request)
    {
        // 名前付きルートにリダイレクト
        return redirect()->route('sample');
    }
}
