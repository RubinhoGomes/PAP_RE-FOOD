<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinhas extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function rotas()
    {
        return $this->hasMany(Rotas::class);
    }
}
