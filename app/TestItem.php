<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestItem extends Model
{
    protected $table = 'test_items';

    public $fillable = [
        'name',
        'sample_id',
        'description',
        'price',
        'is_new'
    ];

    public function sample() {
        return $this->belongsTo(Sample::class);
    }

    public function job()
    {
        return $this->hasOne(Job::class);
    }

    public function testMethods()
    {
        return $this->hasMany(TestMethod::class, 'test_item_id');
    }
}
