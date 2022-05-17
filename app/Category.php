<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = ['category_name', 'category_desc','category_status'];//controler thừa kế từ  brand
    protected $primaryKey = 'category_id';
 	protected $table = 'tbl_category_product';
}
