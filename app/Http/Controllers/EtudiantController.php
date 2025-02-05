<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    
   public function index(){

    return Inertia::render('Etudiant/Index');

}
}
