<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable = array('motifConsultation','dateConsultation','modeDeVie','decision','histoireMaladie','maladie','alegie',
                                'handicap','operation');
   protected $rules = array('motif'=>'required|min:10','modevie'=>'required|min:10','decision'=>'required|min:10');

   public function traitementencours(){
       return $this->hasMany(TraitementEnCours::class);
   }

   public function examenComplementaire(){
       return $this->hasMany(ExamenComplementaire::class);
   }

    public function patient(){
       return $this->belongsTo(Patient::class);
   }
    public function medecin(){
       return $this->belongsTo(Medecin::class);
   }
}
