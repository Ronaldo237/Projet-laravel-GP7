<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;


    protected $table = 'evenements';
    protected $primarykey = 'evenements_id';
    protected $increment = true;
    //protected $timestamps = true;

    protected $fillable = [

        "evenements_id",
        "titre",
        "description",
        "date",
        "lieu",
        "programme",
        "inscription_ouverte",

    ];

    public function Evenement()
    {
        return $this->hasMany(Evenement::class, "evenements_id");
    }
    //
}
