<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\User\UserKind;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserFactory::new()->create([
            'user_id' => Str::orderedUuid()->toString(),
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('secret'),
            'user_kind_id' => UserKind::Admin->value,
        ]);

        UserFactory::new()->create([
            'user_id' => Str::orderedUuid()->toString(),
            'name' => 'Student',
            'email' => 'student@test.com',
            'password' => Hash::make('secret'),
            'user_kind_id' => UserKind::Student->value,
        ]);

        UserFactory::new()->create([
            'user_id' => Str::orderedUuid()->toString(),
            'name' => 'Teacher',
            'email' => 'teacher@test.com',
            'password' => Hash::make('secret'),
            'user_kind_id' => UserKind::Teacher->value,
        ]);
    }
}
