<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index($id)
    {
        $data = [
            'msg'=>'id = ' . $id,
        ];
        return view('hello.index', $data);
    }

    public function other()
    {
        // 名前付きルート
        return redirect()->route('hello');
    }
}
