<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentEnCours extends Model
{
    use HasFactory;
    protected $fillable = array('libelle');

    public function traitementencours(){
        return $this->belongsTo(TraitementEnCours::class);
    }

}
