<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    public function cat(){
        return $this->hasMany(Cat::class, 'id', "cats");
    }
}
