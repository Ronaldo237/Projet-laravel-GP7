<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medias extends Model
{
    use HasFactory;

    protected $table = 'medias';
    protected $primarykey = 'medias_id';
    protected $increment = true;
    //protected $timestamps = true;

    protected $fillable = [
        "medias_id",
        "chercheur_id",
        "type",
        "url",
    ];

    public function Medias()
    {
        return $this->hasMany(Medias::class, "medias_id");
    }


}
