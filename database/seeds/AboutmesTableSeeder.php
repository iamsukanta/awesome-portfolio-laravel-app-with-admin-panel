<?php

use Illuminate\Database\Seeder;

class AboutmesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_mes')
        ->insert([
        'section_1' => 'My name is Sukanta Bala. I am a CSE graduate from Noakhali Science and Technology University. I have been working in a software firm since 1st Oct, 2016 as a junior web developer. I have been developing various project since university. These projects are based on MEAN stack, pure HTML, CSS, JavaScript, Vue JS, and ASP.NET etc. You can find my Curriculum Vitae link in footer section. I always take care my client’s project deadline. I am hard worker person and I am highly interested to learn a new technology. Reading tech blog is like a hobby to me. You can depend on me without no hesitation for completing your dream project. My favourite quote is "Where knowledge is limited, where intelligence is available, there is impossible to release."',
        'section_2' => 'My nationality is Bangladeshi. I am proud to be a Bangladeshi. My home district is Gopalganj. You are always welcome to visit my village home.',
        'image' => '8_1551954267.jpg',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
