<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class EtudiantImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // request()->validate([
        //     'name' => 'required|string|unique:users'
        // ]);

        $user = User::create(
            [
                'name' => $row[0],
                'email' => $row[3],
                'password' => Hash::make('StudentEs@t1c')
            ]);

        $user->assignRole('participant') ;

        return new Etudiant([
            'matricule'     => $row[0],
            'nom'    => $row[1], 
            'prenom'    => $row[2],
            'email'    => 'esatic.student@gmail.com', 
            'genre'    => $row[3],
            'classe'    => $row[4],
            'promotion'    => $row[5] ,
            'user_id' => $user->id
        ]);
    }
}
