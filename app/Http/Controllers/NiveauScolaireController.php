<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\NiveauScolaire;

class NiveauScolaireController extends Controller
{
   public function index(){
    $niveauScolaires =NiveauScolaire::orderBy("nom", direction: "ASC")->paginate(2);
  
        return Inertia::render('NiveauScolaire/IndexNiveauScolaire', [
            'niveauScolaires' =>$niveauScolaires
        ]);

}

    public function store(Request $request)
    {
        $request->validate(["nom" => "requered"]);
        
        NiveauScolaire::create(["nom" => $request->nom]);
    }
}