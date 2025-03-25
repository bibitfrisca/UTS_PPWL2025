<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockout extends Model
{
    use HasFactory;
     
    protected $table = 'stockouts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'stockout_code', 
        'product_id', 
        'product_name', 
        'user_id',
        'name',
        'quantity', 
        'date'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_name', 'name');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'name');
    }
}