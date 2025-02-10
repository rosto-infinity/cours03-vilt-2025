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
// app/Http/Controllers/NiveauScolaireController.php
    public function store(Request $request)
    {
        // $request->validate(["nom" => "required|unique:NiveauScolaire"]);
        $request->validate(["nom" => "required|unique:App\\Models\NiveauScolaire"]);
        
        NiveauScolaire::create(["nom" => $request->nom]);

        return redirect()->back();
    }
      // Méthode d'édition (si vous souhaitez aussi une page dédiée)
      public function edit(NiveauScolaire $niveauScolaire)
      {
          // Si vous souhaitez utiliser une page distincte pour l'édition :
          return inertia('NiveauScolaire/EditeNiveauScolaire', [
              'niveauScolaire' => $niveauScolaire,
          ]);
      }
  
      // Mise à jour du niveau scolaire
      public function update(Request $request, NiveauScolaire $niveauScolaire)
      {
          $request->validate([
              "nom" => "required|unique:App\\Models\\NiveauScolaire,nom," . $niveauScolaire->id,
          ]);
  
          $niveauScolaire->update([
              "nom" => $request->nom,
          ]);
  
          return redirect()->back();
      }
      // Méthode pour supprimer un niveau scolaire
    public function destroy(NiveauScolaire $niveauScolaire)
    {
        $niveauScolaire->delete();
        return redirect()->back();
    }
}