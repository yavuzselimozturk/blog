<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table="articles";
    protected $fillable=["id" , "baslik" , "category_id" , "icerik" , "resim" ,"slug" , "created_at" , "updated_at"];

    function getCategory(){
      return $this->hasOne('App\Models\Post','id','category_id');
    }

}
