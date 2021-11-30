<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Stage;
use App\Models\Encadreur;
use App\Models\Stagiaire;
use App\Models\Specialite;
use App\Models\Universite;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StagiaireStoreRequest;

class StagiaireController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (! Gate::any(['access-admin','access-employe'])) {
            abort(403);
        }

        $departements = Departement::all();
        $encadreurs = Encadreur::all();
        $specialites = Specialite::all();
        $stages = Stage::all();
        $universites = Universite::all();

        $date = Carbon::now()->format('Y-m-d');

        if (is_null($request->get('search'))){
            $stagiaires = Stagiaire::all();
            if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('first_name', 'like', "%{$request->search}%")->get();
                    }

            return view('stagiaires.index',[
                'stagiaires' => $stagiaires,
                'departements' => $departements,
                'encadreurs' => $encadreurs,
                'specialites' => $specialites,
                'stages' => $stages,
                'universites' => $universites,
                'date' => $date,
            ]);
        } else {
            switch ($request->get('selector')) {
                case 'first_name':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('first_name', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('first_name', 'like', "%{$request->search}%")->get();
                    }
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'date' => $date,
                    ]);
                case 'last_name':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('last_name', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('last_name', 'like', "%{$request->search}%")->get();
                    }
                    
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'date' => $date,
                    ]);
                case 'birthday':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('birthday', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('birthday', 'like', "%{$request->search}%")->get();
                    }
                    
                    $staBirthday = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staBirthday' => $staBirthday,
                        'date' => $date,
                    ]);
                case 'birthplace':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('birthplace', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('birthplace', 'like', "%{$request->search}%")->get();
                    }
                    
                    $staBirthplace = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staBirthplace' => $staBirthplace,
                        'date' => $date,
                    ]);
                case 'gender':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('gender', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('gender', 'like', "%{$request->search}%")->get();
                    }
                    $staGender = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staGender' => $staGender,
                        'date' => $date,
                    ]);
                case 'adress':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('adress', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('adress', 'like', "%{$request->search}%")->get();
                    }
                    $staAdress = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staAdress' => $staAdress,
                        'date' => $date,
                    ]);
                case 'phone':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('phone', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('phone', 'like', "%{$request->search}%")->get();
                    }
                    $staPhone = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staPhone' => $staPhone,
                        'date' => $date,
                    ]);
                case 'email':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('email', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('email', 'like', "%{$request->search}%")->get();
                    }
                    $staEmail = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staEmail' => $staEmail,
                        'date' => $date,
                    ]);
                case 'annee':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('annee', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('annee', 'like', "%{$request->search}%")->get();
                    }
                    $staAnnee = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staAnnee' => $staAnnee,
                        'date' => $date,
                    ]);
                case 'date_debut':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('date_debut', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('date_debut', 'like', "%{$request->search}%")->get();
                    }
                    $staDateDebut = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staDateDebut' => $staDateDebut,
                        'date' => $date,
                    ]);
                case 'date_fin':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('date_fin', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('date_fin', 'like', "%{$request->search}%")->get();
                    }
                    $staDateFin = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staDateFin' => $staDateFin,
                        'date' => $date,
                    ]);
                case 'memoire':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('memoire', 'like', "%{$request->search}%")->get();
                    }
                    $staMemoire = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staMemoire' => $staMemoire,
                        'date' => $date,
                    ]);

                case 'date_depose_memoire':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('date_depose_memoire', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('date_depose_memoire', 'like', "%{$request->search}%")->get();
                    }
                    $staDateDeposeMemoire = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staDateDeposeMemoire' => $staDateDeposeMemoire,
                        'date' => $date,
                    ]);

                case 'attachment':
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->where('attachment', 'like', "%{$request->search}%")
                                                ->get();
                    } else {
                        $stagiaires = Stagiaire::where('attachment', 'like', "%{$request->search}%")->get();
                    }
                    $staAttachment = true;
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'staAttachment' => $staAttachment,
                        'date' => $date,
                    ]);


                default:
                    if ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('specialite_id', $request->specialite)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('departement_id', $request->departement)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->get();
                    } elseif ( $request->get('universite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('departement_id', $request->departement)
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->get();
                    } elseif ( $request->get('specialite') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('encadreur_id', $request->encadreur)
                                                ->get();
                    } elseif ( $request->get('departement') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('encadreur') && $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->where('stage_id', $request->stages)
                                                ->get();
                    } elseif ( $request->get('universite') ) {
                        $stagiaires = Stagiaire::where('universite_id', $request->universite)
                                                ->get();
                    } elseif( $request->get('specialite') ) {
                        $stagiaires = Stagiaire::where('specialite_id', $request->specialite)
                                                ->get();
                    } elseif( $request->get('departement') ) {
                        $stagiaires = Stagiaire::where('departement_id', $request->departement)
                                                ->get();
                    } elseif( $request->get('encadreur') ) {
                        $stagiaires = Stagiaire::where('encadreur_id', $request->encadreur)
                                                ->get();
                    } elseif( $request->get('stages') ) {
                        $stagiaires = Stagiaire::where('stage_id', $request->stages)
                                                ->get();
                    } else {
                        $stagiaires = [];
                    }
                    return view('stagiaires.index', [
                        'stagiaires' => $stagiaires,
                        'departements' => $departements,
                        'encadreurs' => $encadreurs,
                        'specialites' => $specialites,
                        'stages' => $stages,
                        'universites' => $universites,
                        'date' => $date,
                    ]);
            }
        }

    }

    public function create()
    {
        if (! Gate::any(['access-admin','access-employe'])) {
            abort(403);
        }

        $departements = Departement::all();
        $encadreurs = Encadreur::all();
        $specialites = Specialite::all();
        $stages = Stage::all();
        $universites = Universite::all();

        return view('stagiaires.create', [
            'departements' => $departements,
            'encadreurs' => $encadreurs,
            'specialites' => $specialites,
            'stages' => $stages,
            'universites' => $universites,
        ]);
    }

    public function store(StagiaireStoreRequest $request)
    {
        if (! Gate::any(['access-admin','access-employe'])) {
            abort(403);
        }

        if ( $request->attachment == 1 ) {
            $attachment = true;
        } else {
            $attachment = false;
        }

        if ( $request->memoire == 1 ) {
            $memoire = true;
        } else {
            $memoire = false;
        }

        Stagiaire::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'gender' => $request->gender,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email,
            'annee' => $request->annee,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'memoire' => $memoire,
            'date_depose_memoire' => $request->date_depose_memoire,
            'attachment' => $attachment,
            'specialite_id' => $request->specialite,
            'departement_id' => $request->departement,
            'encadreur_id' => $request->encadreur,
            'stage_id' => $request->theme,
            'universite_id' => $request->universite,
        ]);
        return redirect()->route('stagiaire.index')->with('message', 'stagiaire ajouté avec succès');
    }

    public function show($id)
    {
        if (! Gate::any(['access-admin','access-employe'])) {
            abort(403);
        }

        $date = Carbon::now()->format('Y-m-d');


        $stagiaire = Stagiaire::findOrFail($id);
        return view('stagiaires.information', [
            'stagiaire' => $stagiaire,
            'date' => $date,
        ]);
    }

    public function edit(Stagiaire $stagiaire)
    {
        if (! Gate::any(['access-admin','access-employe'])) {
            abort(403);
        }

        $departements = Departement::all();
        $encadreurs = Encadreur::all();
        $specialites = Specialite::all();
        $stages = Stage::all();
        $universites = Universite::all();

        return view('stagiaires.edit',[
            'stagiaire' => $stagiaire,
            'departements' => $departements,
            'encadreurs' => $encadreurs,
            'specialites' => $specialites,
            'stages' => $stages,
            'universites' => $universites,
        ]);
    }

    public function update(StagiaireStoreRequest $request, Stagiaire $stagiaire)
    {
        if (! Gate::any(['access-admin','access-employe'])) {
            abort(403);
        }

        if ( $request->attachment == 1 ) {
            $attachment = true;
        } else {
            $attachment = false;
        }

        if ( $request->memoire == 1 ) {
            $memoire = true;
        } else {
            $memoire = false;
        }

        $stagiaire->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'gender' => $request->gender,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email,
            'annee' => $request->annee,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'attachment' => $attachment,
            'memoire' => $memoire,
            'date_depose_memoire' => $request->date_depose_memoire,
            'specialite_id' => $request->specialite,
            'departement_id' => $request->departement,
            'encadreur_id' => $request->encadreur,
            'stage_id' => $request->theme,
            'universite_id' => $request->universite,
        ]);
        return redirect()->route('stagiaire.index')->with('message', 'Stagiaire modifié avec succès');
    }

    public function destroy(Stagiaire $stagiaire)
    {
        if (! Gate::any(['access-admin','access-employe'])) {
            abort(403);
        }

        $stagiaire->delete();

        return redirect()->route('stagiaire.index')->with('message', 'Stagiaire supprimé avec succés');
    }

    public function dashboard ()
    {
        if (! Gate::any(['access-admin','access-employe'])) {
            abort(403);
        }

        $nbr_stagiaire = Stagiaire::count();

        return view('dashboard', [
            'nbr_stagiaire' => $nbr_stagiaire,
        ]);
    }
}
