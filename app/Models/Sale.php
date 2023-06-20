<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'invoice_date', 'invoice_no', 'consumer_name', 'item_code', 'qty', 'unit_price', 'total_price'
    ];
}
