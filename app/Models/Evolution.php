<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolution extends Model
{
    use HasFactory;
    protected $fillable =array('date','description');


     public function consultation(){
        return $this->belongsTo(Consultation::class);
    }

    
}
