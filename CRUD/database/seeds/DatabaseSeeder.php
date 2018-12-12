<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ProductsTableSeeder::class);//cuando ejecutemos el comando seeder va a hacer referencia a este seeder "ProductsTableSeeder"
    }
}
