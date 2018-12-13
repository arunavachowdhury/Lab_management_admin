<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    public $fillable = [
        'name',
        'description'
    ];

    public function testItems() {
        return $this->hasMany(TestItem::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
