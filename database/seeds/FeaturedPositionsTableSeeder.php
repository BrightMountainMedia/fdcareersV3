<?php

use Illuminate\Database\Seeder;

class FeaturedPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FeaturedPosition::class, 10)->create();
    }
}
