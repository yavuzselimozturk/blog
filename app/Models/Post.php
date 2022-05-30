<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table="kategoriler";
    protected $fillable=["id" , "isim" , "slug" , "created_at" , "updated_at"];

    public function articleCount(){
      return $this->hasMany('App\Models\Article','category_id','id')->count();
    }
}
