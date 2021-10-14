<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTypes = [
            [
                'name' => 'Admin',
                'key' => 'admin'
            ],
            [
                'name' => 'Moderator',
                'key' => 'moderator'
            ],
            [
                'name' => 'Editor',
                'key' => 'editor'
            ],
            [
                'name' => 'User',
                'key' => 'user'
            ],
        ];

        foreach ($userTypes as $userType) UserType::firstOrCreate($userType);
    }
}
