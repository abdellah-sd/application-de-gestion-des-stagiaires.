<?php

namespace App\Models;

use App\Models\Stage;
use App\Models\Encadreur;
use App\Models\Specialite;
use App\Models\Universite;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'birthplace',
        'gender',
        'adress',
        'phone',
        'email',
        'annee',
        'date_debut', 
        'date_fin', 
        'memoire', 
        'date_depose_memoire', 
        'attachment',
        'specialite_id',
        'departement_id',
        'encadreur_id',
        'stage_id',
        'universite_id'
    ];

    public function specialite () {
        return $this->belongsTo(Specialite::class);
    }

    public function encadreur () {
        return $this->belongsTo(Encadreur::class);
    }

    public function departement () {
        return $this->belongsTo(Departement::class);
    }

    public function stage () {
        return $this->belongsTo(Stage::class);
    }

    public function universite () {
        return $this->belongsTo(Universite::class);
    }
}
