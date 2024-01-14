<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->first();

        Teacher::query()->create([
            "email" => "putri21@gmail.com",
            "name" => "Putri",
            "nip" => 12345,
            "education" => "S1",
            "gender" => "Pria",
            "user_id" => $user->id,
        ]);
    }
}
