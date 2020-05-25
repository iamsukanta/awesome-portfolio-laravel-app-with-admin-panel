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
        $this->call('UsersTableSeeder');
        $this->call('AboutmesTableSeeder');
        $this->call('BlogpostsTableSeeder');
        $this->call('PortfoliosTableSeeder');
        $this->call('ResumesTableSeeder');
    }
}
