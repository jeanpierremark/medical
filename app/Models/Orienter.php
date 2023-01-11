<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orienter extends Model
{
    use HasFactory;
    protected $fillable = array('domaine');
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function secretaire(){
        return $this->belongsTo(Secretaire::class);
    }
}
