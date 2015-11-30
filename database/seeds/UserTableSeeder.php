<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Mike Ferrara',
            'email'=> 'mferrara@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
