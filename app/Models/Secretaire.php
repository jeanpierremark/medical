<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaire extends Model
{
    use HasFactory;
    protected $fillable = array('nom','prenom','telephone','adresse');
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orienter(){
        return $this->hasMany(Orienter::class);
    }
}
