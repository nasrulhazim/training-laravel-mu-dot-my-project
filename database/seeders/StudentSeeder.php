<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! app()->isProduction()) {
            Student::factory(rand(50, 100))
                ->has(
                    Course::factory()->count(rand(1,5))
                )
                ->create();
        }
    }
}
