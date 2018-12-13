<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    public $fillable = [
        'unit',
    ];
    
    public function testMethods() {
        return $this->hasOne(TestMethod::class, 'uom_id');
    }
}
