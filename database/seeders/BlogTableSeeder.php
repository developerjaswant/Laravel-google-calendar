<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use database\factories\BlogFactory;

class BlogTableSeeder extends Seeder{

  // Run the database seeds.   
  @return void

  public function run() {
      Blog::factory()->times(10)->create();//we will generate 50 records
  }

}