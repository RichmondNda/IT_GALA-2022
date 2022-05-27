<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function etudiant()
    {
        return $this->hasOne(Etudiant::class) ;
    }


    public function hasVote(int $categorieId)
    {

        $categorie = Categorie::where('id', $categorieId)->first();
        
        $vote = Vote::where(['user_id'=> Auth::user()->id ,'categorie_id' => $categorie->id])->first();

        if($vote)
        {
            return true ;
        }
        else 
        {
            return false ;
        }

    }


    public function hasVoteFor(int $categorieId, int $nomineId)
    {

        $etudiant = Etudiant::where('user_id', Auth::user()->id)->first();

        if($etudiant)
        {

            if($nomineId)
            {
                $categorie = Categorie::where('id', $categorieId)->first();
        
                $vote = Vote::where(['user_id'=> Auth::user()->id ,'categorie_id' => $categorie->id])->first();
        
                if($vote)
                {
                    if($vote->nomine_id == $nomineId)
                    {
                        return true ;
                    }
                    else 
                    {
                        return false ;
                    }
                }
                else
                {
                    return false ;
                }

            }else 
            {
                return false ;
            }

        }else{
            return false ;
        }

    }


    public function getPersoneVoted(int $categorieId)
    {

        // $etudiant = Etudiant::where('user_id', Auth::user()->id)->first();

        // if($etudiant)
        // {
            $categorie = Categorie::where('id', $categorieId)->first();
        
            $vote = Vote::where(['user_id'=> Auth::user()->id ,'categorie_id' => $categorie->id])->first();
    
            $nomine = Nomine::find($vote->nomine_id) ;


            return $nomine ;

        // }else{
        //     return false ;
        // }

    }

}
