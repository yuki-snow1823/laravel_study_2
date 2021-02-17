<?php
namespace App\Http\Controllers;


use App\MyClasses\MyServiceInterface;        // 追加
use App\Facades\MyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Http\Pagination\MyPaginator;
use App\Models\Person;



class HelloController extends Controller
{


public function index(Request $request)
{
    $msg = 'show people record.';
    $keys = Person::get()->modelKeys(); // keyを取得

    $even = array_filter($keys, function($key)
        {
            return $key % 2 == 0;
        });

    // 2で割り切れるidのものをfilterしてる？のみかな
    $result = Person::get()->only($even); // id指定
    
    $data = [
        'msg' => $msg,
        'data' => $result,
    ];
    return view('hello.index', $data);
}

// どこからくるの。URLか。
public function save($id, $name)
{
    $record = Person::find($id);
    $record->name = $name;
    $record->save();
    return redirect()->route('hello');
}



    
    
}
