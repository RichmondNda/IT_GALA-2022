<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded ;

    public function type()
    {
        return $this->belongsTo(TypeTicket::class) ;
    }

    public function getPersonne(int $id)
    {
        return Personne::find($id) ;
    }

    public function getRegister()
    {
        $log = Log::where('ticket_id', $this->id)->first() ;
        return User::find($log->user_id) ;
    }

}
