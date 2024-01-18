<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function children()
    {
        return $this->hasMany(CategoryRelation::class, 'parent_id', 'id_category')
                    ->with('child'); // Cargar la relación 'child'
    }

    public function parent()
    {
        return $this->hasMany(CategoryRelation::class, 'child_id', 'id_category')
                    ->with('parent'); // Cargar la relación 'parent'
    }
    
}
