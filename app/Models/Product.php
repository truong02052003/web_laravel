<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $appends=['favorited'];
    protected $fillable=['name','status','price','sale_price','image','category_id','content'];

    //1-1
    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    //1-n
    public function images()
    {
        return $this->hasMany(Product_Image::class,'product_id','id');
    }
    public function getFavoritedAttribute()
    {
        $favorited=Favorite::where(['product_id'=>$this->id,'customer_id'=>auth('cus')->id()])->first();
        return $favorited ? true :false;
    }
}
