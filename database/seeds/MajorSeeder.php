<?php

use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            ["7340101", "Quản trị kinh doanh", 4, 200000, 7],
            ["7440201", "Địa chất học", 4, 200000, 6],
            ["7440221", "Khí tượng và khí hậu học", 4, 200000, 2],
            ["7440224", "Thuỷ văn học", 4, 200000, 2],
            ["7440298", "Biến đổi khí hậu và Phát triển bền vững", 5, 200000, 2],
            ["7480104", "Hệ thống thông tin", 5, 300000, 8],
            ["7480201", "Công nghệ thông tin", 5, 300000, 8],
            ["7510406", "Công nghệ kỹ thuật môi trường", 5, 300000, 1],
            ["7520503", "Kỹ thuật trắc địa - bản đồ", 5, 300000, 4],
            ["7580212", "Kỹ thuật tài nguyên nước", 5, 300000, 9],
            ["7580213", "Kỹ thuật cấp thoát nước", 5, 300000, 9],
            ["7850101", "Quản lý tài nguyên và môi trường biển đảo", 4, 200000, 9],
            ["7850196", "Quản lý tài nguyên khoáng sản", 4, 200000, 7],
            ["7850103", "Quản lý đất đai", 4, 200000, 4]
        ];

        foreach ($majors as $major) {
            DB::table('majors')->insert([
                'majorCode' => $major[0],
                "majorName" => $major[1],
                "majorTimeTraining" => $major[2],
                "majorCostPerCredit" => $major[3],
                "departmentId" => $major[4]
            ]);
        }
    }
}
