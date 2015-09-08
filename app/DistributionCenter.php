<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributionCenter extends Model {

	protected $table = 'distribution_centers';

    protected $fillable = ['name', 'address', 'phone', 'work_from', 'work_to'];

}
