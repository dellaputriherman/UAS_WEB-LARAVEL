<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->first();

        Student::query()->create([
            "email" => "dellaputri0694@gmail.com",
            "name" => "Della",
            "nis" => 12345,
            "jurusan" => "PEMROGRAMAN WEB",
            "status" => "Active",
            "user_id" => $user->id
        ]);
    }
}
