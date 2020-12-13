<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'section_id',
        'product_name',
        'description',
        'created_by',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
