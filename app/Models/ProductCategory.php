<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class ProductCategory extends Model
{
    protected $table = "product_category";
    protected $fillable = ['category_name','status'];


    /*Show all active category*/
    public static function activeCategory($data){
    	return DB::table('product_category')
	    	->where('status', $data)
	    	->get();
    }

    /*update category table*/
    public static function updateCategory($input,$data){
    	return DB::table('product_category')
	    	->where('id', $data->id)
	    	->update([
                'category_name' => $input['category_name'],
                'status' => $input['status'],
	    		'updated_at' => date('Y-m-d h:i:s')
	    		]);
    }

    /*delete category in category table*/
    public static function deleteCategory($data){
    	return DB::table('product_category')
    	->where('id', $data->id)
    	->delete();
    }
}
