<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable=['reg_number','brand','model','owner_id'];
    use HasFactory;

    public function owner(){
        return $this->belongsTo(owner::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}


