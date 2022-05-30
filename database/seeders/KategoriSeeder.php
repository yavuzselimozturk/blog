<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriler=['Genel','Günlük Yaşam','Bilişim','Teknoloji','Spor','Sağlık','Gezi'];
        foreach($kategoriler as $kategori){
        DB::table('kategoriler')->insert([
          'isim'=>$kategori,
          "slug"=>Str::slug($kategori,'-'),
        ]);
      }
    }
}
