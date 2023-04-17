<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guide extends Model {
    use HasFactory;

    protected $table = 'guides';
    protected $fillable = ["code_Guides", "nom_Guides", "prenom_Guides", "email_Guides", "motdepasse_Guides"];
    protected $primaryKey = 'code_Guides';
    public $timestamps = false;

}
