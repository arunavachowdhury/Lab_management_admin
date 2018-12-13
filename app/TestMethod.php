<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestMethod extends Model
{
    protected $fillable = [
                'sample_id',
                'test_items_id',
                'uom_id',
                'name',
                'specified_range_from',
                'specified_range_to',
                ];

    public function testItem()
    {
        return $this->belongsTo(TestItem::class);
    }

    public function uom() {
        return $this->belongsTo(Uom::class);
    }
}


