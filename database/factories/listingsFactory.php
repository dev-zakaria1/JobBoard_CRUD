<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\listings>
 */
class listingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
        ];
    }
}
