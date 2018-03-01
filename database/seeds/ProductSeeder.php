<?php
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creem 10 productes.
        factory(PRODUCT::class, 10)->create();
    }
}
