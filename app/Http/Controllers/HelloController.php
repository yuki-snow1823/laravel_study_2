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
    Storage::disk('local')->putFile('files', $request->file('file'));
    return redirect()->route('hello');


}



    
}
