<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publications extends Model
{
    use HasFactory;

    protected $table = 'publications';
    protected $primarykey = 'publications_id';
    protected $increment = true;
    //protected $timestamps = true;

    protected $fillable = [

       "publications_id",
       "chercheurs_id",
        "titre",
         "resume",
         "lien",
          "domaines_recherche_id",
           "fichier_pdf",

    ];

    public function publications()
    {
        return $this->hasMany(Publications::class, "publications_id");
    }


}
