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
    $name = $request->query('name');
    $mail = $request->query('mail');
    $tel = $request->query('tel');
    $msg = $name . ', ' . $mail . ', ' . $tel;
    $keys = ['名前','メール','電話'];
    $values = [$name, $mail, $tel];
    $data = [
        'msg'=> $msg,
        'keys'=>$keys,
        'values'=>$values,
    ];
    $request->flash();
    return view('hello.index', $data);
}


    
public function other(Request $request)
{
    $ext = "." . $request->file("file")->extension();
    Storage::disk('local')->putFileAs('files', $request->file('file'), "uploaded". $ext); // ここで名前を指定
    return redirect()->route('hello');


}



    
}
