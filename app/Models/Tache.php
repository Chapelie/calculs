<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = [
    'projet_id',
    'nomTache',
    'descriptionTache',
    'dateDebut',
    'dateFin',
    'budget_tache',
    'evolution',];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
