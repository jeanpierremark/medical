<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraitementEnCours extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = array('libelle', 'type');

   protected $rules = array('libelle'=>'required|min:10','type'=>'required|min:10');

   public function consultation(){
       return $this->belongsTo(Consultation::class);
   }

     public function medicamentenCours(){
       return $this->hasMany(MedicamentEnCours::class);
   }

}
