<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalisation extends Model
{
    use HasFactory;
    protected $fillable =array('dateEntree','dateSortie','service','medecin_id','patient_id');


     public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function medecin(){
        return $this->belongsTo(Medecin::class);
    }
}
