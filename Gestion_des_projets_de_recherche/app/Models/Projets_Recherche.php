<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Projets_Recherche extends Model
{
    use HasFactory;

    protected $table = 'projets_recherche';
    protected $primarykey = 'projets_recherche_id';
    protected $increment = true;
    //protected $timestamps = true;

    protected $fillable = [
        
        "projets_recherche_id",
         "chercheurs_id",
         "titre",
         "description",
          "financement",
           "etat",
            "date_debut",
             "date_fin",
              "equipe_recherche",

    ];

    public function Projets_Recherche()
    {
        return $this->hasMany(Projets_Recherche::class, "projets_recherche_id");
    }

}
