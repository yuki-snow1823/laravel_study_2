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
    $url = Storage::disk('public')->url($this->fname);
    $size = Storage::disk('public')->size($this->fname);
    $modified = Storage::disk('public')
        ->lastModified($this->fname);
    $modified_time = date('y-m-d H:i:s', $modified);
    $sample_keys = ['url', 'size', 'modified'];
    $sample_meta = [$url, $size, $modified_time];
    $result = '<table><tr><th>' . implode('</th><th>',
        $sample_keys) . '</th></tr>';
    $result .= '<tr><td>' . implode('</td><td>',
        $sample_meta) . '</td></tr></table>';
    
    $sample_data = Storage::disk('public')->get($this->fname);


    $data = [
        'msg'=> $result,
        'data'=> explode(PHP_EOL, $sample_data)
    ];
    return view('hello.index', $data);
}
    
public function other($msg)
{
    Storage::disk('public')->delete('bk_' . $this->fname); // 消す
    Storage::disk('public')->copy($this->fname,  // コピーして別名で動かす
        'bk_' . $this->fname);
    Storage::disk('local')->delete('bk_' . $this->fname);
    Storage::disk('local')->move('public/bk_' . $this->fname, 
        'bk_' . $this->fname);
    
    return redirect()->route('hello');
} 
    
}
