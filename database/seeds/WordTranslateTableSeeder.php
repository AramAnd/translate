<?php

use Illuminate\Database\Seeder;

class WordTranslateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('word_translate')->delete();
        DB::table('word_translate')->insert([
        	[
            	'lng1' => '1',
            	'lng2' => '2',
        	],
        	[
            	'lng1' => '1',
            	'lng2' => '3',
        	],
        	[
            	'lng1' => '2',
            	'lng2' => '3',
        	],
        	[
            	'lng1' => '5',
            	'lng2' => '4',
        	]
        ]);
    }
}
