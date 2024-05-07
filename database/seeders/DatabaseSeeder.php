<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'indratarigan@unja.ac.id',
            'password' => bcrypt('12345678'),
            'role' => 'administrator'
        ]);

        $user =
            User::create([
                'email' => 'khoirulanam@unja.ac.id',
                'password' => bcrypt('12345678'),
                'role' => 'participant'
            ]);

        Participant::create([
            'full_name1' => 'Khoirul Anam',
            'full_name2' => 'Khoirul Anam S.Kom',
            'gender' => 'male',
            'participant_type' => 'participant',
            'institution' => 'Universitas Jambi',
            'address' => 'Jambi',
            'phone' => '085788787427',
            'user_id' => $user->id,
            'attendance' => 'offline'
        ]);
    }
}
