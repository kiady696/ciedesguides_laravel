<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vallee extends Model {
    use HasFactory;

    protected $table = 'vallees';
    protected $fillable = ["code_Vallees", "nom_Vallees"];
    protected $primaryKey = 'code_Vallees';
    public $timestamps = false;

}
