<?php

namespace App\Models;

use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = ['theme'];

    public function stagiaires () {
        return $this->hasMany(Stagiaire::class);
    }
}
