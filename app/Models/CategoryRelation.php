<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRelation extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id_category');
    }

    public function child()
    {
        return $this->belongsTo(Category::class, 'child_id', 'id_category');
    }
}
