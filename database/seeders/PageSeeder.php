<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ['Hakkımızda', 'Kariyer', 'Vizyon', 'Misyon'];
        $count = 0;
      foreach ($pages as $page) {
        $count++;
        DB::table('pages')->insert([
          'title' => $page,
          'slug' => Str::slug($page),
          'image' => 'https://assets.enuygun.com/media/lib/750x525/uploads/image/5040.jpeg',
          'content' => 'lorem ipsum dolor sit amet',
          'order' => $count,
          'created_at' => now(),
          'updated_at' => now()
        ]);
      }
    }
}


?>