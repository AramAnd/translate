<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('words')->delete();
        DB::table('words')->insert([
        	[
            	'label' => 'cat',
            	'lng' => 'en',
        	],
        	[
            	'label' => 'katu',
            	'lng' => 'am',
        	],
        	[
            	'label' => 'koshka',
            	'lng' => 'ru',
        	],
        	[
            	'label' => 'shun',
            	'lng' => 'am',
        	],
        	[
            	'label' => 'sobaka',
            	'lng' => 'ru',
        	],
        ]);
    }
}
