<?php

use Illuminate\Database\Seeder;
use App\Sample;
use App\TestItem;
use App\UOM;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Sample::truncate();
        // TestItem::truncate();
        // UOM::truncate();

        User::truncate();
        factory(User::class, 20)->create();
    }
}
