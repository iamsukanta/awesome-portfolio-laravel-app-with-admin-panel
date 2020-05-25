<?php

use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')
        ->insert([
        'title' => 'Milton Home Care (Pvt.) Limited',
        'development_tools' => 'PHP, Bootstrap, CSS3, jQuery, JavaScript',
        'web_address' => 'https://miltonhomecare.org/',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
