<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DomaineRecherche extends Model
{
    use HasFactory;


    protected $table = 'domaines_recherche';
    protected $primarykey = 'domaines_recherche_id';
    protected $increment = true;
    //protected $timestamps = true;


    protected $fillable = [
        "nom" ,
    ];

    public function ModelRecherche()
    {
        return $this->hasMany(DomaineRecherche::class, "domaines_recherche_id");
    }
}
