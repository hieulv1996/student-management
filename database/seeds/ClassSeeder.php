<?php

use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            ["04CNTT01", "Lớp 04CNTT1", "05/09/2015", "05/09/2019", 8],
            ["04CNTT02", "Lớp 04CNTT2", "05/09/2015", "05/09/2019", 8],
            ["04CNTT03", "Lớp 04CNTT3", "05/09/2015", "05/09/2019", 8],
        ];
        foreach ($classes as $class) {
            DB::table('classes')->insert([
                "classCode" => $class[0],
                "className" => $class[1],
                "startDate" => $class[2],
                "endDate" => $class[3],
                "departmentId" => $class[4]
            ]);
        }
    }
}
