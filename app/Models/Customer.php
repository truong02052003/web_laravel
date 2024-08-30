<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements AuthenticatableContract
{
    use AuthenticatableTrait;
    protected $fillable=['name','email','password','phone','address','gender'];

    // Các thuộc tính và phương thức khác của lớp Customer
    public function favorites()
    {
        return $this->hasMany(Favorite::class,'customer_id','id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class,'customer_id','id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'customer_id','id')->orderBy('id','DESC');
    }
}
