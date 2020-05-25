<?php

use Illuminate\Database\Seeder;

class ResumesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resumes')
        ->insert([
        'resume_link' => 'https://drive.google.com/file/d/1xFYi9ZqQpmtgn7dJzFk5HnjvjdxOtBSl/view?usp=sharing',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
