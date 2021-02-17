<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


class Person extends Model
{
    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

    public function getNameAndIdAttribute()
    {
        return $this->name . ' [id=' . $this->id . ']';
    }


    public function getNameAndMailAttribute()
    {
        return $this->name . ' (' . $this->mail . ')';
    }


    public function getNameAndAgeAttribute()
    {
        return $this->name . '(' . $this->age . ')';
    }
    public function getAllDataAttribute()
    {
        return $this->name . '(' . $this->age . ')'
            . ' [' . $this->mail . ']';
    }

    protected $guarded = ['id'];

// ミューてた
    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer',
    ];
}


class MyCollection extends Collection
{
    public function fields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
