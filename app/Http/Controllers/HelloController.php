<?php
namespace App\Http\Controllers;


use App\MyClasses\MyServiceInterface;        // 追加
use App\Facades\MyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HelloController extends Controller
{


public function index($id)
{
    $msg = 'show page: ' . $id;
    $result = DB::table('people')
        ->paginate(3, ['*'], 'page', $id);


    $data = [
        'msg' => $msg,
        'data' => $result,
    ];
    return view('hello.index', $data);
}


    
    
}
