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
    $result = [];
    DB::table('people')
        ->chunkById(3, function($items) use (&$msg, &$result)
    {
        foreach($items as $item)
        {   
            // dd($item->Id);

            $msg .= $item->Id . ' ';
            $result += array_merge($result, [$item]);
            // dump($result);
            break;
        }
        return true;
    });

    $data = [
        'msg' => $msg,
        'data' => $result,
    ];
    return view('hello.index', $data);
}

    
    
}
