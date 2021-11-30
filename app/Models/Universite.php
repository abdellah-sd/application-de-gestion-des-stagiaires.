<?php

namespace App\Models;

use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Universite extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short_name', 'location'];

    public function stagiaires () {
        return $this->hasMany(Stagiaire::class);
    }
}
