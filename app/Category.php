<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function category_type()
    {
        return $this->belongsTo(CategoryType::class, 'category_type_id', 'id');
    }
}
