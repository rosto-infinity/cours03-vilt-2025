<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\NiveauScolaire;

class NiveauScolaireController extends Controller
{
   public function index(){
    // $niveauScolaires =NiveauScolaire::orderBy("nom", direction: "ASC")->paginate(2);
    $niveauScolaires =NiveauScolaire::latest()->paginate(3);
  
        return Inertia::render('NiveauScolaire/IndexNiveauScolaire', [
            'niveauScolaires' =>$niveauScolaires
        ]);

}

    public function store(Request $request)
    {
        $request->validate(["nom" => "required"]);
        
        NiveauScolaire::create(["nom" => $request->nom]);

        return redirect()->back();
    }
}