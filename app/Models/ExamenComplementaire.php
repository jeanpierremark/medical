<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenComplementaire extends Model
{
    use HasFactory;
    protected $fillable = array('contenu','dateExamen',);

    protected $rules = array();
  public function consultation(){
      return $this->belongsTo(Consultation::class);
  }
}
