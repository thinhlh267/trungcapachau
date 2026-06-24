<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        $majors = ['Quản trị mạng máy tính', 'Thiết kế đồ họa', 'Kế toán doanh nghiệp', 'Hướng dẫn du lịch', 'Tiếng Anh'];
        $classifications = ['Xuất sắc', 'Giỏi', 'Khá', 'Trung bình khá', 'Trung bình'];

        for ($i = 1; $i <= 50; $i++) {
            Degree::create([
                'degree_code' => 'ACV-TEST-' . str_pad($i, 3, '0', STR_PAD_LEFT), 
                'student_name' => $faker->name,
                'date_of_birth' => $faker->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
                'major' => $faker->randomElement($majors),
                'classification' => $faker->randomElement($classifications),
                'cohort' => 'K' . $faker->numberBetween(18, 20),
                'issuing_body' => 'Trường Trung cấp Á Châu',
                'issue_date' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
            ]);
        }
    }
}