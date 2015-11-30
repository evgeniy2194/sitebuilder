<?php

use Illuminate\Database\Seeder;

class DomaingroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Domaingroup::create([
            'name' => 'Shoes'
        ]);
    }
}
