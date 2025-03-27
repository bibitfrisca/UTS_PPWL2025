<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'name',
        'price',
        'category'
    ];

     /**
     * Get the available categories for the product.
     *
     * @return array
     */
    public static function getCategories()
    {
        return ['Makeup', 'Skincare'];
    }
}
