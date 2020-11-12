<?php
namespace App\Http\Controllers;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;        // 追加

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class HelloController extends Controller
{


    public function index(Request $request, Response $response)
    {
        $name = $request->query('name');
        $mail = $request->query('mail');
        $tel = $request->query('tel');
        $msg = $request->query('msg');
        $keys = ['名前','メール','電話'];
        $values = [$name, $mail, $tel];
        $data = [
            'msg'=> $msg,
            'keys'=>$keys,
            'values'=>$values,
        ];
        $request->flash();
        // 過去に入れた値を残す


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
