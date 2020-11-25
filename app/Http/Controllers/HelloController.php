<?php
namespace App\Http\Controllers;


use App\MyClasses\MyService;


class HelloController extends Controller
{


public function index(int $id = -1)
{
    $myservice = app()->makeWith('App\MyClasses\MyService', 
            ['id' => $id]);
    $data = [
        'msg'=> $myservice->say($id),
        'data'=> $myservice->alldata()
    ];
    return view('hello.index', $data);
}




    public function other()
    {
        // ダミーデータ
        $data = [
            'name' => 'Taro',
            'mail' => 'taro@yamada',
            'tel' => '090-999-999',
        ];
        $query_str = http_build_query($data);
        $data['msg'] = $query_str;
        // データを持ったままリダイレクトしてRouteにいく。
        return redirect()->route('hello', $data);
    }
    
}
