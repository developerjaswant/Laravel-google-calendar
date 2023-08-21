<?php

namespace Database\Factories;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory

{

  // The name of the factory's corresponding model.

  protected $model = Blog::class;

  // Define the model's default state.

  public function definition(){
      return [
          'name'=>$this->faker->text,
          'author'=>$this->faker->text,
          
      ];
  }

}