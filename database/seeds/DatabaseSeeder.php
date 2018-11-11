<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MslidersTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(SeoPagesSeeder::class);
        $this->call(SoluTableSeeder::class);
        $this->call(ContPromoTableSeeder::class);
        $this->call(GraysHomesPortsTableSeeder::class);
    }
}
