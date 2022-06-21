<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            CompanySeeder::class,
            DocumentTypeSeeder::class,
            UniversitySeeder::class,
            AcademicLevelSeeder::class,
            FacultySeeder::class,
            ProgramSeeder::class,
            RoleSeeder::class,
            PersonSeeder::class,
            PersonAcademicSeeder::class,
            PersonCompanySeeder::class,
            // UserSeeder::class
        ]);
    }
}
