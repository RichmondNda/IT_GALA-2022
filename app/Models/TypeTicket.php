<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    public function gala()
    {
        return $this->belongsTo(Gala::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'type_id');
    }

}
