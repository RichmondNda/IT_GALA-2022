<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    public function getTicketCode()
    {
        $ext3 = Ticket::where('personne_id', $this->id)->first() ;
        if($ext3) 
        {
            return $ext3->code ;        
        }
        else
        {
            $ext = Ticket::where('homme_id', $this->id)->first() ;
            if($ext) 
            {
                return $ext->code ; 
            }

            $extf = Ticket::where('femme_id', $this->id)->first() ;

           if($extf) 
            {
                 return $extf->code ; 
            }
        
        }
    }

    public function getTicket()
    {
        
        $ext3 = Ticket::where('personne_id', $this->id)->first() ;
        if($ext3) 
        {
            return TypeTicket::where('id', $ext3->type_id)->first()->libelle ;        
        }
        else
        {
            $ext = Ticket::where('homme_id', $this->id)->first() ;
            if($ext) 
            {
                return TypeTicket::where('id', $ext->type_id)->first()->libelle ; 
            }

            $extf = Ticket::where('femme_id', $this->id)->first() ;

           if($extf) 
            {
                 return TypeTicket::where('id', $extf->type_id)->first()->libelle ; 
            }
        
        }
    }
}
