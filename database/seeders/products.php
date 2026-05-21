<?php

namespace Database\Seeders;

use App\Models\products as ModelsProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class products extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    ModelsProduct::create([
      'title' => 'zakaria',
      'tags' => 'tagshello',
      'company' => 'company',
      'location' => 'location',
      'email' => 'email@gmail.com',
      'website' => 'http://helloworld.com',
      'description' => 'Lorem ipsum dolor sit amet consectetur 
      adipisicing elit. Quaerat deserunt recusandae non 
      veritatis harum unde reiciendis voluptates ad temporibus, sequi, 
      doloremque repudiandae quas placeat debitis odio.'
    ]);
    ModelsProduct::create([
      'title' => 'zakaria',
      'tags' => 'tagshello',
      'company' => 'company',
      'location' => 'location',
      'email' => 'email@gmail.com',
      'website' => 'http://helloworld.com',
      'description' => 'Lorem ipsum dolor sit amet consectetur 
      adipisicing elit. Quaerat deserunt recusandae non 
      veritatis harum unde reiciendis voluptates ad temporibus, sequi, 
      doloremque repudiandae quas placeat debitis odio.'
      
    ]);
  }
}
