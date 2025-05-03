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
        $n = rand(1, 8);
        $jobListings = [
            ["NovaTech Solutions", "Software Engineer (Backend)", "NovaTech Solutions, a dynamic tech company, seeks a skilled Backend Software Engineer to design, develop, and maintain robust server-side logic. You'll build efficient APIs, write clean code, collaborate with front-end teams, troubleshoot issues, and optimize for performance, ensuring the stability and security of our innovative applications. A Bachelor's in Computer Science and proven backend experience with languages like Java or Python, databases, and RESTful APIs are essential."],
            ["Evergreen Industries", "Front-End Developer", "Evergreen Industries, focused on engaging digital experiences, is looking for a talented Front-End Developer to build user interfaces for our web applications. You'll translate designs into functional code using HTML, CSS, and JavaScript frameworks (e.g., React), optimize for speed and responsiveness, ensure cross-browser compatibility, and contribute to improving front-end practices. A Bachelor's in Computer Science and strong proficiency in front-end technologies are required."],
            ["Summit Global Group", "Marketing Specialist", "Summit Global Group, a results-oriented organization, needs a creative Marketing Specialist to develop and execute strategies that enhance brand awareness and drive customer acquisition. You'll conduct market research, manage social media, create marketing materials, track campaign performance, and collaborate with sales to align marketing efforts. A Bachelor's in Marketing and proven experience with digital marketing tools are key."],
            ["Coastal Breeze Co.", "Data Analyst", "Coastal Breeze Co., a customer-focused company, seeks a detail-oriented Data Analyst to collect, clean, analyze, and interpret large datasets, providing actionable insights for business growth. You'll develop reports and dashboards, present findings, and collaborate with teams to understand their data needs. A Bachelor's in a quantitative field and proficiency in data analysis tools like Excel and SQL are essential."],
            ["Apex Digital Agency", "Project Manager", "Apex Digital Agency, a leading digital marketing firm, is looking for a highly organized Project Manager to oversee and coordinate digital marketing projects from start to finish. You'll define scope, manage plans and budgets, coordinate teams and stakeholders, track progress, and ensure timely and high-quality delivery. A Bachelor's degree and proven project management experience, preferably in digital marketing, are required."],
            ["Starlight Innovations", "Customer Support Representative", "Starlight Innovations, committed to exceptional customer service, needs a friendly Customer Support Representative to handle customer inquiries via various channels, provide product information, troubleshoot issues, and ensure a positive customer experience. Excellent communication, problem-solving skills, and a customer-focused attitude are essential."],
            ["NovaTech Solutions", "Sales Associate", "We are seeking a motivated Sales Associate to engage with customers, understand their needs, and effectively present our products or services to achieve sales targets while providing excellent customer service and maintaining product knowledge. Proven sales or customer service experience and strong communication skills are desired."],
            ["Summit Global Group", "Human Resouce Generalist", "We are looking for a versatile HR Generalist to support recruitment, employee relations, benefits administration, policy implementation, and training initiatives, contributing to a positive work environment and ensuring compliance with labor laws. A Bachelor's degree in HR and proven experience in a similar role are required."]
        ];
        for($i = 0; $i < $n; $i++){
            $jobListing = fake()->randomElement($jobListings);
            DB::table('job_listings')->insert([
                'title' => $jobListing[1],
                'description' => $jobListing[2],
                'company' => $jobListing[0],
                'location' => fake()->city(),
                'salary' => round(fake()->numberBetween(4000000, 10000000)/100000) * 100000,
                'closing_date' => fake()->dateTimeThisMonth(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
