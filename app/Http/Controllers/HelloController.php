<?php
namespace App\Http\Controllers;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;        // 追加

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class HelloController extends Controller
{
    private $fname;


    public function __construct()
    {
        $this->fname = 'hello.txt';
    }



public function index(Request $request, Response $response)
{
    $msg = 'please input text:';
    $keys = [];
    $values = [];
    if ($request->isMethod('post'))
    {
        $form = $request->only(['name', 'mail']);
        Log::warning($form);
        // 配列として入る
        $keys = array_keys($form);
        $values = array_values($form);
        $data = [
            'msg'=>'you inputted.',
            'keys'=>$keys,
            'values'=>$values,
        ];
        return view('hello.index', $data);
    }
    $data = [
        'msg'=> $msg,
        'keys'=>$keys,
        'values'=>$values,
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
