<?php

use Illuminate\Database\Seeder;

class DomainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Domain::create([
            'name'              => 'shoes.'.getenv('APP_URL'),
            'domaingroup_id'    => \App\Domaingroup::first()->id,
            'keywordgroup_id'   => \App\Keywordgroup::first()->id
        ]);
    }
}
