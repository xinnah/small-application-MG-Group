<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Products extends Model
{
    protected $table = "products";
    protected $fillable = ['product_id','product_name','product_details','fk_category_id'];

    /*Show all product category wise*/
    public static function getProductsCategoryWise(){
    	return DB::table('products')
    	->join('product_category','products.fk_category_id','=','product_category.id')
    	->select('products.*','product_category.category_name')
    	->get();
    }
}
