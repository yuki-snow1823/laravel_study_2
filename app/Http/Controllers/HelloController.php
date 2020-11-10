<?php
namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;        // 追加


class HelloController extends Controller
{
    private $fname;


    public function __construct()
    {
        $this->fname = 'sample.txt';
    }


    public function index()
    {
        $sample_msg = $this->fname;
        $sample_data = Storage::get($this->fname);
        $data = [
            'msg'=> $sample_msg,
            'data'=> explode(PHP_EOL, $sample_data)
        ];
        return view('hello.index', $data);
    }


public function other($msg)
{
    Storage::append($this->fname, $msg);
    return redirect()->route('hello');
}
}
