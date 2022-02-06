<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $table = 'recipes';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name', 'note', 'image'];







    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot(['amount']);
    }
}
