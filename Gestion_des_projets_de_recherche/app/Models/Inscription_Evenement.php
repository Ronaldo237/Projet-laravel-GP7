<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription_Evenement extends Model
{
    use HasFactory;


    protected $table = 'inscription_evenements';
    protected $primarykey = 'inscription_evenements_id';
    protected $increment = true;
    //protected $timestamps = true;

    protected $fillable = [

        "inscription_evenements_id",
        "evenements_id",
        "users_id",

    ];

    public function Inscription_Evenement()
    {
        return $this->hasMany(inscription_evenement::class, "inscription_evenements_id");
    }
    
}
