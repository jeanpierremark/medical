<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;
    protected $fillable = array('dateOrdonnance');

    public function traitement(){
        return $this->belongsTo(Traitement::class);
    }
    public function medicament(){
        return $this->hasMany(Medicament::class);
    }
}
