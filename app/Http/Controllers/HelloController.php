<?php
namespace App\Http\Controllers;


use App\MyClasses\MyServiceInterface;        // 追加
use App\Facades\MyService;
use Illuminate\Http\Request;

class HelloController extends Controller
{


public function index(Request $request)
{
    $data = [
        'msg'=> $request->msg,
        'data'=> $request->alldata,
    ];
    return view('hello.index', $data);
}
    
    
}
