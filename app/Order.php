<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    const STATUS_NEW = 'new';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_DELIVERED = 'delivered';

	protected $table = 'orders';

    protected $fillable = ['status', 'book_time', 'type_id', 'method_id', 'center_id', 'user_id', 'amount'];

    public function animalType(){
        return $this->belongsTo('App\AnimalType', 'type_id');
    }

    public function cuttingMethod(){
        return $this->belongsTo('App\CuttingMethod', 'method_id');
    }

    public function distCenter(){
        return $this->belongsTo('App\DistributionCenter', 'center_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
