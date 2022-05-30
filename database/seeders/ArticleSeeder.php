<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Factory::create();
        for($i=0 ; $i<4 ; $i++){
          $baslik=$faker->sentence(6);
          DB::table('articles')->insert([
            'category_id'=>rand(1,6),
            'baslik'=>$baslik,
            'resim'=>$faker->imageUrl(800, 400, 'cats' , true),
            'icerik'=>$faker->paragraph(6),
            'slug'=>Str::slug($baslik,'-'),
            'created_at'=>$faker->dateTime('now'),
            'updated_at'=>now(),


          ]);
        }
    }
}
