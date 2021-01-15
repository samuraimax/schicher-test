<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDatabaseFromFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $database_name = env('DB_DATABASE');
        // DB::statement("CREATE DATABASE `{$database_name}`");
        $path = public_path('../schicher_db.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $database_name = env('DB_DATABASE');
        // DB::statement("DROP DATABASE `{$database_name}`");
        // Schema::dropIfExists('database_from_file');
    }
}
