<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name', 'cena', 'kalo', 'jm'];


    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
