<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = array('idAn','prenom','nom','telephone','adresse','profession','age','sexe','niveauEtude');
    protected $rules = array('telephone'=>'required|min:9');

    public function rendezvous(){
        return $this->hasMany(RendezVous::class);
    }

    public function traitement(){
        return $this->hasMany(Traitement::class);
    }

    public function hospitalisation(){
        return $this->hasMany(Hospitalisation::class);
    }
    public function consultation(){
        return $this->hasMany(Consultation::class);
    }
    public function orienter(){
        return $this->hasMany(Orienter::class);
    }

}
