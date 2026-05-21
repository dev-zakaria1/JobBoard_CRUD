<?php

namespace Database\Seeders;

use App\Models\listings;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\products;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user=User::factory()->create([
            'name'=>'John Doe',
            'email'=>'john@gmail.com',
            'password'=>'123456',
        ]);
        listings::factory(6)->create([
            'user_id'=>$user->id
        ]);
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     // products::class,
        //     listings::class,
        // ]);
    }
}
