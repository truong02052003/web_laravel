<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable=['name','status','link','image','content','prioty','position'];

    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function scopeGetBanner($q,$pos='top-banner')
    {
       $q=$q->where('position',$pos)
       ->where('status',1)
       ->orderBy('prioty','ASC');
       return $q;
    }
}
// INSERT INTO banners(name,status,link,image,content,prioty,position) VALUES
// ('NSDHFA',1,'#','banner_bg.png','',0,'top-banner');

// INSERT INTO banners(name,status,link,image,content,prioty,position) VALUES
// ('gallery 1',1,'#','gallery_img01.png','',0,'gallery'),
// ('gallery 2',1,'#','gallery_img02.png','',0,'gallery'),
// ('gallery 3',1,'#','gallery_img03.png','',0,'gallery');

// INSERT INTO products(name,image,price,sale_price,category_id) VALUES
// ('Produc1','h2_product01.png',10000,9000,1),
// ('Produc2','h2_product02.png',10000,9000,2),
// ('Produc3','h2_product03.png',10000,9000,3)