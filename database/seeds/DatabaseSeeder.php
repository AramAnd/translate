<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        
        $this->call(WordsTableSeeder::class);

        $this->command->info('Words table seeded!');


        $this->call(WordTranslateTableSeeder::class);

        $this->command->info('WordTranslate table seeded!');

        
        Model::reguard();
    }
}
