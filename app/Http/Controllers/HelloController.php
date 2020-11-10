<?php
namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;        // 追加


class HelloController extends Controller
{
    private $fname;


    public function __construct()
    {
        $this->fname = 'hello.txt';
    }


public function index()
{
    $dir = '/';
    $all = Storage::disk('local')->allfiles($dir);
    
    $data = [
        'msg'=> 'DIR: ' . $dir,
        'data'=> $all
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
