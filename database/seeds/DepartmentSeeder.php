<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentNames = [
            "Khoa Môi trường",
            "Khoa Khí tượng, Thủy văn và Biến đổi khí hậu",
            "Khoa Tài nguyên nước",
            "Khoa Quản lý đất đai",
            "Trắc địa, Bản đồ và GIS",
            "Khoa Địa chất và Khoáng sản",
            "Khoa Kinh tế, Tài nguyên và Môi trường",
            "Khoa Hệ thống thông tin và Viễn thám",
            "Khoa Quản lý tài nguyên biển và Hải đảo",
            "Khoa Khoa học Đại cương",
            "Khoa Luật và Lý luận chính trị"
        ];

        foreach ($departmentNames as $departmentName) {
            DB::table('departments')->insert([
                'departmentName' => $departmentName,
                "active" => true,
            ]);
        }
    }
}
