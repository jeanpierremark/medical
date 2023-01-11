<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $fillable = array('libelle','date');
    protected $rules = array('libelle'=>'required|min:10');

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function medecin(){
        return $this->belongsTo(Medecin::class);
    }
}
