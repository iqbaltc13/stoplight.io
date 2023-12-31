<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(BasicAuthenticationsSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(FileTypesSeeder::class);
        $this->call(ConfirmationTypeSeeder::class);
        $this->call(RekeningSeeder::class);
        $this->call(LogTransferSeeder::class);

        // $this->call(UsersTableSeeder::class);
    }
}
