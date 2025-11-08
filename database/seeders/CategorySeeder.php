<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Categories::create([
            'name'=>'Categoria_teste_seeder',
            'description'=>'Descrição_seeder'
        ]);
        */
        Categories::factory(3)->create();
    }
}
