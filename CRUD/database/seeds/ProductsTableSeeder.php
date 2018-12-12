<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Product::class, 80)->create();//cuando se ejecute esta funcion por ser factory va a buscar los datos en el archivo UserFactory.php
    }
}
