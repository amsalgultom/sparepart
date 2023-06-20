<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'id',
        'item_id',
        'user_id',
        'status',
        'qty'
    ];

    public function item(){
    	return $this->hasMany('App\Models\Item');
    }
}
