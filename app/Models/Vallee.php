<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vallee extends Model {
    use HasFactory;

    protected $table = 'vallees';
    protected $fillable = ["code_Vallees", "nom_Vallees"];
    protected $primaryKey = 'code_Vallees';
    public $timestamps = false;

    /**
     * Get the abris for the vallee.
     */
    public function abris(): HasMany
    {
        return $this->hasMany(Abri::class, 'code_Vallees');
    }

}
