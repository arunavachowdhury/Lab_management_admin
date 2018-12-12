<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestItem extends Model
{
    protected $table = 'test_items';

    public $fillable = [
        'name',
        'sample_id',
        'is_standard_id',
        'uom_id',
        'specified_range_from',
        'specified_range_to',
        'description',
        'price'
    ];

    public function sample() {
        return $this->belongsTo(Sample::class);
    }

    public function uom() {
        return $this->belongsTo(Uom::class);
    }

    public function job()
    {
        return $this->hasOne(Job::class);
    }

    public function isStandard()
    {
        return $this->belongsTo(ISStandard::class);
    }
}
