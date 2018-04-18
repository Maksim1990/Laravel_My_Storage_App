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
        for($i=0;$i<22;$i++){
            DB::table('books')->insert([
                'user_id' => 12,
                'active' => 1,
                'title' => str_random(10),
                'author' => str_random(10),
                'date' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
