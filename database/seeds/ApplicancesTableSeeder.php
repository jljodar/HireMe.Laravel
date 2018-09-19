<?php

use Illuminate\Database\Seeder;

class ApplicancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Applicance::class, 772)->create();
    }
}
