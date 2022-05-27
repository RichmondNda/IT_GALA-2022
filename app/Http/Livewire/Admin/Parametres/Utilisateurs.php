<?php

namespace App\Http\Livewire\Admin\Parametres;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class Utilisateurs extends Component
{
    use WithPagination ;

    public $username ='';
    public $email ='';
    public $categorie = '' ;


    public function render()
    {
        return view('livewire.admin.parametres.utilisateurs', [
            'utilisateurs' => User::where('isAdmin', true)
                                ->paginate(6)
        ]);
    }

    public function resetInput()
    {
        $this->username = '' ;
        $this->categorie = '' ;
        $this->email = '' ;
    }

    public function createUser()
    {
       $this->validate([
           'email' => 'required|email|unique:users',
           'categorie' => 'required|string',
           'username' => 'required|string|unique:users,name'
       ]);

       

       $user = User::create([
        'name' => $this->username,
        'email' =>  $this->email,
        'password' => Hash::make('@'.$this->username.'@')
        ]);

        $user->isAdmin = true ;
        $user->save() ;

        $user->assignRole($this->categorie) ;

        //dd($user) ;
        $this->resetInput() ;

    }


    public function deleteUser(int $id)
    {
        if($id)
        {
            $user = User::find($id);

            $user->delete() ;
        }
    }


}
