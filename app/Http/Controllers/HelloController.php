<?php
namespace App\Http\Controllers;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;        // 追加

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class HelloController extends Controller
{
    private $fname;


    public function __construct()
    {
        $this->fname = 'hello.txt';
    }



// アクセスしたらアクセス、リクエストがポストなら投稿処理、だから同じルーティングでいける
public function index(Request $request)
{
    $msg = 'please input text:';
    if ($request->isMethod('post'))
    {
        $msg = 'you typed: "' . $request->input('msg') . '"';
    }
    $data = [
        'msg'=> $msg,
    ];
    return view('hello.index', $data);
}

    
public function other(Request $request)
{
    $ext = "." . $request->file("file")->extension();
    Storage::disk('local')->putFileAs('files', $request->file('file'), "uploaded". $ext); // ここで名前を指定
    return redirect()->route('hello');


}



    
}
