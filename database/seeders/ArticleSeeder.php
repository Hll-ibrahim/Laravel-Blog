<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<4; $i++) {
          
          DB::table('articles')->insert([
            'category_id' => rand(1,7),
            'title' => "Kerpeten",
            'slug' => "kerpeten",
            'content' =>" Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem harum    quas soluta 
                  voluptate neque. Sint dignissimos doloribus delectus soluta autem libero, quo molestiae fugiat recusandae, pariatur minima provident mollitia amet.",
            "image" => "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg",
            'created_at' => now(),
            'updated_at' => now()
          ]);
        }
    }
}
