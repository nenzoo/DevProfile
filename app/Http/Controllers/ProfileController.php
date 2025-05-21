<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Affiche le formulaire de modification du profil.
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Met à jour les informations du profil utilisateur.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'username' => 'required|string|max:255|alpha_dash|unique:users,username,' . Auth::id(),
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        // Mise à jour des informations de l'utilisateur
        Auth::user()->update($request->only(['name', 'email', 'username', 'title', 'bio']));

        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
    }

    /**
     * Supprime le compte de l'utilisateur.
     */
    public function destroy()
    {
        $user = Auth::user();
        
        // Déconnecter l'utilisateur
        Auth::logout();
        
        // Supprimer l'utilisateur
        $user->delete();
        
        // Rediriger vers la page d'accueil
        return redirect('/');
    }
}