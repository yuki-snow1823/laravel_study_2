<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{
    public function index(Person $person)
    {
        $data = [
        'msg'=>$person,
    ];
        return view('hello.index', $data);
    }



    public function other(Request $request)
    {
        // middlewareの設定したものを呼び出している
        $data = [
            'msg'=>$request->bye,
        ];
        return view('hello.index', $data);
    }
}
