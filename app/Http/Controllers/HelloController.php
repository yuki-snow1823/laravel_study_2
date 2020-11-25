<?php
namespace App\Http\Controllers;


use App\MyClasses\MyService;


class HelloController extends Controller
{


    public function index(MyService $myservice) // インスタンスが入る、作られる
    {
        $data = [
            'msg'=> $myservice->say(),
            'data'=> $myservice->data()
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
