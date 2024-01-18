<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function categories()
    // {
    //     return $this->hasMany(Category::class);
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function dosages()
    {
        return $this->hasMany(Dosage::class);
    }
}
