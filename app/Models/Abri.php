<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abri extends Model {
    use HasFactory;

    protected $table = 'abris';
    protected $primaryKey = 'code_Abris';
    protected $fillable = ["code_Abris", "nom_Abris", "type_Abris", "altitude_Abris", "places_Abris", "prixNuit_Abris", "prixRepas_Abris", "telGardien_Abris", "code_Vallees"];
    public $timestamps = false;
}
