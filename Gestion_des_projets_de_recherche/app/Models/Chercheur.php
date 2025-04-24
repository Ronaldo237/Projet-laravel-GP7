<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chercheur extends Model
{
    use HasFactory;

    protected $table = 'chercheurs';
    protected $primaryKey = 'chercheurs_id'; // correction ici
    public $incrementing = true;             // correction ici
    public $timestamps = true;               // réactivation des timestamps

    protected $fillable = [
        'photo',
        'biographie',
        'cv',
        'google_scholar',
        'linkedin',
        'user_id',
        'domaine_recherche_id',
    ];

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function domaine()
    {
        return $this->belongsTo(DomaineRecherche::class, 'domaine_recherche_id');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class, 'chercheur_id');
    }

    public function projets()
    {
        return $this->hasMany(ProjetRecherche::class, 'chercheur_id');
    }
}
