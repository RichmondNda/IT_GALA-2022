<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomine extends Model
{
    use HasFactory;
    
    protected $guarded = [] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }


    public function votes()
    {
        return $this->hasMany(Vote::class) ;
    }

}
