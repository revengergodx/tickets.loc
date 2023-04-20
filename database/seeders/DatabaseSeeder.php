<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 0,
        ],
            ['name' => 'agent1',
                'email' => 'agent1@agent',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role' => 1,
            ],
            ['name' => 'agent2',
                'email' => 'agent2@agent',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role' => 1,
            ],
            ['name' => 'agent3',
                'email' => 'agent3@agent',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role' => 1,
            ],
            ['name' => 'agent4',
                'email' => 'agent4@agent',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role' => 1,
            ],
            ['name' => 'user',
                'email' => 'user@user',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role' => 2,
            ]]);

        DB::table('categories')->insert([[
            'title' => 'Uncategorized',
        ],
            [
            'title' => 'Billing/Payments',
        ],
            [
            'title' => 'Technical question',
        ]]);

        DB::table('labels')->insert([
            ['title' => 'bug'],
            ['title' => 'enhancement'],
            ['title' => 'question'],
        ]);

        DB::table('priority')->insert([
            ['name' => 'ВИСОКИЙ'],
            ['name' => 'СЕРЕДНІЙ'],
            ['name' => 'НИЗЬКИЙ']
        ]);

    }
}
