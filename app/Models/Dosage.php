<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosage extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'average_dose',
        'minimum_dose',
        'maximum_dose',
        'unique_dose',
    ];

    public function medicineDosage()
    {
        return $this->belongsTo(Medicine::class);
    }
}
