<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rotas extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function carrinhas()
    {
        return $this->belongsTo(Carrinhas::class);
    }
}
