<?php

namespace App\Models;

use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Encadreur extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name'];

    public function stagiaires () {
        return $this->hasMany(Stagiaire::class);
    }
}
