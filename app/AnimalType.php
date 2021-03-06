<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model {

    protected $table = 'animal_types';

	protected $fillable = ['name', 'stock', 'price'];

    protected $hidden = ['created_at', 'updated_at'];

}
