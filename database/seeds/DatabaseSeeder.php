<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('Users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('professions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
