<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chercheur extends Model
{
    use HasFactory;


    protected $table = 'chercheurs';
    protected $primarykey = 'chercheurs_id';
    protected $increment = true;
    //protected $timestamps = true;

    protected $fillable = [

        "chercheurs_id",
        "speudo",
        "specialite",
        "laboratoire",
        "photo",
        "biographie",
        "cv",
        "google_scholar",
        "linkedin",
        "users_id",
        "domaines_recherche_id",

    ];

    public function Chercheurs()
    {
        return $this->hasMany(Chercheur::class, "chercheurs_id");
    }
    //


}
