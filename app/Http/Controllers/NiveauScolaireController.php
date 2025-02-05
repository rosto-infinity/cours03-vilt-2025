<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\NiveauScolaire;

class NiveauScolaireController extends Controller
{
   public function index(){
    $NiveauScolaires =NiveauScolaire::orderBy("nom", "ASC")->get();

        return Inertia::render('NiveauScolaire/Index', [
            'NiveauScolaires' =>$NiveauScolaires
        ]);
  
}
}