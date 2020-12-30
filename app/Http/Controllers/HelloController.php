<?php
namespace App\Http\Controllers;


use App\MyClasses\MyServiceInterface;        // 追加
use App\Facades\MyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HelloController extends Controller
{


public function index()
{
    $data = ['msg' => '', 'data' => []];
    $msg = 'get: ';
    $result = DB::table('people')->orderBy('name', 'asc')
        ->first();
        // dd($result);
    $data = [
        'msg' => $msg,
        'data' => $result,
    ];
    return view('hello.index', $data);
}

    
    
}
