<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CuttingMethod extends Model {

	protected $table = 'cutting_methods';

    protected $fillable = ['name', 'fees'];

    protected $hidden = ['created_at', 'updated_at'];

}
