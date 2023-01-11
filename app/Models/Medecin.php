<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = array('nom','prenom','telephone','adresse','specialite','idUser');


    public function consultation(){
        return $this->hasMany(Consultation::class);
    }
    public function rendezVous(){
        return $this->hasMany(RendezVous::class);
    }
    public function traitement(){
        return $this->hasMany(Traitement::class);
    }
    public function hospitalisation(){
        return $this->hasMany(Hospitalisation::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
