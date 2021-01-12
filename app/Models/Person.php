<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Person extends Model
{
    use HasFactory;
    // やっぱり予約語なのかな？特別な変数なのかもしれない
    // protected $table = "hoge";


    public function index(Request $request)
{    
    $msg = 'show people record.';
    $result = Person::get(); // 何をgetしてるの？全部？
    $data = [
        'msg' => $msg,
        'data' => $result,
    ];
    return view('hello.index', $data);
}
}
