<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Date;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => "".Str::random(10),
            'username' => 'admin',
            'email' => Str::random(10).'@gmail.com',
            'password' => "".Hash::make('123456'),
            'created_at' => new Date()
        ]);
    }
}
