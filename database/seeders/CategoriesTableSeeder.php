<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [];

      $cName = 'Без категории';
      $categories[] = [
        'name'     => $cName,
        'slug'      => Str::slug($cName),
        'parent_id' => 0,
        'active' => 1,
      ];

      for ($i = 2; $i <=11; $i++) {
        $cName = 'Категория #' . $i;
        $parentId = ($i > 4) ? rand(1, 4) : 1;

        $categories[] = [
          'name'      => $cName,
          'slug'       =>Str::slug($cName),
          'parent_id'  => $parentId,
          'active' => 1,
        ];
      }
      DB::table('categories')->insert($categories);
    }
}
