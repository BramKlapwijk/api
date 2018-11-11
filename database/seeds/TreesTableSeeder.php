<?php

use Illuminate\Database\Seeder;

class TreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = fopen(storage_path('app/public/Bomen.json'),'r');
    }
}
