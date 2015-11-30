<?php

use Illuminate\Database\Seeder;

class KeywordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keywords = [
            'nike',
            'reebok',
            'adidas',
            'tom ford',
            'brooks',
            'saucony',
            'toms',
            'puma',
            'keds',
            'lugz',
            'asics',
            'montrail',
            'merrell',
            'steve madden',
            'dc',
            'dvs',
            'etnies',
            'rockport',
            'vans',
            'nike shoes',
            'nike shoe',
            'reebok shoes',
            'reebok shoe',
            'adidas shoes',
            'adidas shoe',
            'tom ford shoes',
            'tom ford shoe',
            'brooks shoes',
            'brooks shoe',
            'saucony shoes',
            'saucony shoe',
            'toms shoes',
            'toms shoe',
            'puma shoes',
            'puma shoe',
            'keds shoes',
            'keds shoe',
            'lugz shoes',
            'lugz shoe',
            'asics shoes',
            'asics shoe',
            'montrail shoes',
            'montrail shoe',
            'merrell shoes',
            'merrell shoe',
            'steve madden shoes',
            'steve madden shoe',
            'dc shoes',
            'dc shoe',
            'dvs shoes',
            'dvs shoe',
            'etnies shoes',
            'etnies shoe',
            'rockport shoes',
            'rockport shoe',
            'vans shoes',
            'vans shoe'
        ];

        $keyword_group = \App\Keywordgroup::first();
        foreach($keywords as $keyword)
        {
            $keyword_group->keywords()->create(['name' => $keyword]);
        }

    }
}
