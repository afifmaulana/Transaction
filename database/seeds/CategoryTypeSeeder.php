<?php

use Illuminate\Database\Seeder;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CategoryType::create([
            'name' => 'Pemasukkan'
        ]);
        \App\CategoryType::create([
            'name' => 'Pengeluaran'
        ]);
    }
}
