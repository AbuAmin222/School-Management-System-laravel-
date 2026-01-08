<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Guset;
use App\Models\Owner;
use App\Models\Section;
use App\Models\Stage;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password123'),
        // ]);

        Stage::create([
            'name' => 'Primary Stage',
            'tag' => 'p',
        ]);
        Stage::create([
            'name' => 'Preparatory Stage',
            'tag' => 'm',
        ]);
        Stage::create([
            'name' => 'Secondary Stage',
            'tag' => 'h',
        ]);

        $stage_p = Stage::getIdByTag('p');
        Grade::create([
            'name' => 'First Grade',
            'stage_id' => $stage_p,
            'tag' => '1',
        ]);
        Grade::create([
            'name' => 'Secound Grade',
            'stage_id' => $stage_p,
            'tag' => '2',
        ]);
        Grade::create([
            'name' => 'Third Grade',
            'stage_id' => $stage_p,
            'tag' => '3',
        ]);
        Grade::create([
            'name' => 'Fourth Grade',
            'stage_id' => $stage_p,
            'tag' => '4',
        ]);
        Grade::create([
            'name' => 'Fifth Grade',
            'stage_id' => $stage_p,
            'tag' => '5',
        ]);
        Grade::create([
            'name' => 'Sixth Grade',
            'stage_id' => $stage_p,
            'tag' => '6',
        ]);

        $stage_m = Stage::getIdByTag('m');
        Grade::create([
            'name' => 'Seventh Grade',
            'stage_id' => $stage_m,
            'tag' => '7',
        ]);
        Grade::create([
            'name' => 'Eightth Grade',
            'stage_id' => $stage_m,
            'tag' => '8',
        ]);
        Grade::create([
            'name' => 'Nineth Grade',
            'stage_id' => $stage_m,
            'tag' => '9',
        ]);
        $stage_h = Stage::getIdByTag('h');
        Grade::create([
            'name' => 'Tenth Grade',
            'stage_id' => $stage_h,
            'tag' => '10',
        ]);
        Grade::create([
            'name' => 'Eleventh Grade',
            'stage_id' => $stage_h,
            'tag' => '11',
        ]);
        Grade::create([
            'name' => 'Twelfth Grade',
            'stage_id' => $stage_h,
            'tag' => '12',
        ]);

        Section::create([
            'name' => '1',
        ]);
        Section::create([
            'name' => '2',
        ]);
        Section::create([
            'name' => '3',
        ]);
        Section::create([
            'name' => '4',
        ]);
        Section::create([
            'name' => '5',
        ]);
        Section::create([
            'name' => '6',
        ]);
        Section::create([
            'name' => '7',
        ]);

        $Owner = User::factory()->create([
            'email' => 'OwnerTest@example.com',
            'password' => Hash::make('OwnerTest@123'),
        ]);
        $Teacher = User::factory()->create([
            'email' => 'TeacherTest@example.com',
            'password' => Hash::make('TeacherTest@123'),
        ]);
        $Student = User::factory()->create([
            'email' => 'StudentTest@example.com',
            'password' => Hash::make('StudentTest@123'),
        ]);
        $Guest = User::factory()->create([
            'email' => 'GuestTest@example.com',
            'password' => Hash::make('GuestTest@123'),
        ]);

        Owner::factory()->create([
            'user_id' => $Owner,
            'username' => 'OwnerTest',
            'phone' => 123,
            'address' => 'OwnerTest@123',
            'image' => 'OwnerTest@123',
            'permission' => 'admin',
            'status' => 'active',
        ]);
        Teacher::factory()->create([
            'user_id' => $Teacher,
            'name' => 'TeacherTest',
            'phone' => 123,
            'specialization' => 'Prodrammer',
            'date_of_birth' => Carbon::create(2000, 5, 15)->format('Y-m-d'),
            'hire_date'     => Carbon::create(2023, 1, 10)->toDateString(),
            'qualification' => 'diploma',
            'permission' => 'teacher',
            'gender' => 'other',
            'status' => 'active',
        ]);
        Student::factory()->create([
            'user_id' => $Student,
            'section_id' => Section::findOrFail(1)->id,
            'grade_id' => Grade::findOrFail(1)->id,
            'first_name' => $Student,
            'parent_name' => 'StudentTest',
            'last_name' => 'StudentTest',
            'parent_phone' => 123,
            'date_of_birth' => Carbon::create(2025, 11, 10)->format('y-m-d'),
            'permission' => 'student',
            'gender' => 'other',
        ]);
        Guset::factory()->create([
            'user_id' => $Guest,
            'username' => 'GuestTest',
            'phone' => 123,
            'address' => 'GuestTest@123',
            'image' => 'GuestTest@123',
            'permission' => 'user',
            'gender' => 'other',
        ]);
    }
}
