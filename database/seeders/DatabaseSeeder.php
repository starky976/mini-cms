<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        if (app()->environment('local', 'development')) {
            // 開発環境用の大量データ
            $this->call([
                UserSeeder::class,
                PostSeeder::class,
                CategorySeeder::class,
            ]);
        } else {
            // 本番環境用の最小データ
            $this->call([
                // BasicDataSeeder::class,
            ]);
        }
    }
}
