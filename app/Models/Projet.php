<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'localisation',
        'client',
        'avancement',
        'responsable',
        'date_debut',
        'date_fin',
        'budget',
        'user_id',
    ];

    protected $dates = [
        'date_debut',
        'date_fin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
