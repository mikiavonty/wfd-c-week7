<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n = rand(1, 20);
        $jobTitles = [
            "Software Engineer (Backend)",
            "Front-End Developer",
            "Marketing Specialist",
            "Data Analyst",
            "Project Manager",
            "Customer Support Representative",
            "Sales Associate",
            "Human Resouce Generalist"
        ];
        $companies = [
            "NovaTech Solutions",
            "Evergreen Industries",
            "Summit Global Group",
            "Coastal Breeze Co.",
            "Apex Digital Agency",
            "Starlight Innovations"
        ];
        for($i = 0; $i < $n; $i++){
            DB::table('job_listings')->insert([
                'title' => fake()->randomElement($jobTitles),
                'description' => fake()->realText(255),
                'company' => fake()->randomElement($companies),
                'location' => fake()->city(),
                'salary' => round(fake()->numberBetween(4000000, 10000000)/100000) * 100000,
                'closing_date' => fake()->dateTimeThisMonth(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
