<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Inertia\Inertia;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    
   public function index(){

    $etudiants =Etudiant::latest()->paginate(3);
  
        return Inertia::render('Etudiant/IndexEtudiant', [
            'etudiants' =>$etudiants
        ]);

}
   public function create(){

    return Inertia::render('Etudiant/CreateEtudiant');

}
   public function edit(){

    return Inertia::render('Etudiant/EditEtudiant');

}
}