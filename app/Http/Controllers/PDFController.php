<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generate($username)
    {
        // Récupérer l'utilisateur par son nom d'utilisateur
        $user = User::where('username', $username)->firstOrFail();
        
        // Récupérer explicitement les compétences et projets
        $skills = $user->skills;
        $projects = $user->projects;
        
        // Générer le PDF avec toutes les données nécessaires
        $pdf = PDF::loadView('pdf.cv', compact('user', 'skills', 'projects'));
        
        return $pdf->download('cv-'.$username.'.pdf');
    }
}