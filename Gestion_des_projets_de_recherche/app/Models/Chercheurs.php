<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chercheurs extends Model
{
    use HasFactory;


    protected $table = 'chercheurs';
    protected $primarykey = 'chercheurs_id';
    protected $increment = true;
    //protected $timestamps = true;

    protected $fillable = [

        "chercheurs_id",
        "photo",
        "biographie",
        "cv",
        "google_scholar",
        "linkedin",
        "user_id",
        "domaine_recherche_id",

    ];

    public function Chercheurs()
    {
        return $this->hasMany(Chercheurs::class, "chercheurs_id");
    }
    //


}
