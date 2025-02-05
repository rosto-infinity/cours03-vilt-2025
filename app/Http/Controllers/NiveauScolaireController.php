<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class NiveauScolaireController extends Controller
{
   public function index(){

        return Inertia::render('NiveauScolaire/Index');
  
}
}