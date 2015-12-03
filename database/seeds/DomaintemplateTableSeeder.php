<?php

use Illuminate\Database\Seeder;

class DomaintemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = [
            'name'  => 'Basic'
        ];

        $template = \App\Domaintemplate::create($default);
    }
}
