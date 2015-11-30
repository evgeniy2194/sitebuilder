<?php

use Illuminate\Database\Seeder;

class KeywordgroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Keywordgroup::create([
            'name' => 'Shoes'
        ]);
    }
}
