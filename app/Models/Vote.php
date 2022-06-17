<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function categorie() 
    {
        return $this->belongsTo(Categorie::class) ;
    }

    public function nomine() 
    {
        return $this->belongsTo(Nomine::class) ;
    }
}


