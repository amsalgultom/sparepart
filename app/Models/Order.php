<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'user_id', 'customer_id', 'shipping_method', 'sub_total', 'shipping_cost','total','image_payment','date','status_id'
    ];
    public function status()
    {
    	return $this->belongsTo('App\Models\StatusMappings');
    }
    public function customer()
    {
    	return $this->belongsTo('App\Models\Customer');
    }
}
