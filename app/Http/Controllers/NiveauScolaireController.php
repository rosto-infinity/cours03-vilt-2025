<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\NiveauScolaire;

class NiveauScolaireController extends Controller
{
   public function index(){
    $niveauScolaires =NiveauScolaire::orderBy("nom", direction: "ASC")->paginate(4);
  
        return Inertia::render('NiveauScolaire/Index', [
            'niveauScolaires' =>$niveauScolaires
        ]);

}
}