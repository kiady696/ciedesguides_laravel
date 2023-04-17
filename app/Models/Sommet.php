<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sommet extends Model {
    use HasFactory;

    protected $table = 'sommets';
    protected $fillable = ["code_Sommets", "nom_Sommets", "altitude_Sommets"];
    protected $primaryKey = 'code_Sommets';
    public $timestamps = false;

}
