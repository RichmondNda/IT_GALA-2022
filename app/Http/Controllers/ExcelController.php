<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Imports\EtudiantImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    
    public function importExcel(Request $request) 
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        
      try{
        Excel::import(new EtudiantImport,$request->import_file);

        $request->session()->flash('success', 'Mise à jour éffectuée');
           
      }
      catch(Exception $e)
      {

        $request->session()->flash('Warning', 'Certains étudiants sont déjà enregistrés ');
      }
        return back();
    }

    public function exportExcel($type) 
    {
        return Excel::download(new EtudiantImport, 'ITAWARD.'.$type);
    }

    public function DeleteAllStudent(Request $request)
    {
        Etudiant::truncate();

        $request->session()->flash('Warning', 'Suppression effectuée');
        return redirect()->back();
    }

}
