<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::query()->updateOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin123')
        ]);

        $smtps = [
            [
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'encryption' => 'tls',
                'username' => fake()->userName . '@gmail.com',
                'password' => fake()->password
            ],
            [
                'host' => 'smtp.office365.com',
                'port' => 587,
                'encryption' => 'ssl',
                'username' => fake()->userName . '@outlook.com',
                'password' => fake()->password
            ],
            [
                'host' => 'smtp.mail.yahoo.com',
                'port' => 587,
                'encryption' => 'tls',
                'username' => fake()->userName . '@yahoo.com',
                'password' => fake()->password
            ]
        ];

        foreach ($smtps as $smtp) {
            \App\Models\Smtp::query()->updateOrCreate([
                'username' => $smtp['username']
            ], $smtp);
        }

        Customer::factory(100)->create();
    }
}
