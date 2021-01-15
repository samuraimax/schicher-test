<?php

use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listData = [
                [
                    "id"=> 1,
                    "name_type"=> "Super Admin",
                    "status"=> '1'
                ],
                [
                    "id"=> 2,
                    "name_type"=> "Admin",
                    "status"=> '1'
                ],
                [
                    "id"=> 3,
                    "name_type"=> "Tent",
                    "status"=> '1'
                ],
                [
                    "id"=> 4,
                    "name_type"=> "User",
                    "status"=> '1'
                ]
            ];
        UserType::insert($listData);
    }
}
