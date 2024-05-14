<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;
use Str;

class studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for($i=1; $i<=100; $i++){
        $student= new student;
        $student->name=$faker->name;
        $student->email=$faker->email;
        $student->password=$faker->password;
        $student->save();
        }


    }
}
