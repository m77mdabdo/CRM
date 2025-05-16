<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Action;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use App\Models\CustomerEmployee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Customer::factory(10)->create();
        CustomerEmployee::factory()->count(20)->create();

        Action::factory()->count(10)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'role' => 'employee',
        // ]);

        // $this->call([
        //     UserSeeder::class,
        // ]);
    }
}
