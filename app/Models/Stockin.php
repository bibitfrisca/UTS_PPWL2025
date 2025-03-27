<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockin extends Model
{
    use HasFactory;
     
    protected $table = 'stockin';

    protected $primaryKey = 'id';

    protected $fillable = [
        'stockin_code',
        'product_name',
        'quantity',
        'user_id',
        'date',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_name', 'name');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}