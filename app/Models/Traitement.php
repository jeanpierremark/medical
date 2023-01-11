<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{

    use HasFactory;
    protected $fillable = array('libelle', 'type',);

   protected $rules = array('libelle'=>'required|min:10','type'=>'required|min:10');

   public function patient(){
       return $this->belongsTo(Patent::class);
   }

   public function medecin(){
    return $this->belongsTo(Medecin::class);
}
    public function medicamentenCours(){
       return $this->hasMany(MedicamentEnCours::class);
   }

}
