<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('categorias')->insert([
            ['nombre' => '90s', 'descripcion' => 'Categoría relacionada con contenido de los años 1990.'],
            ['nombre' => '2000s', 'descripcion' => 'Categoría relacionada con contenido de los años 2000.'],
            ['nombre' => '2010s', 'descripcion' => 'Categoría relacionada con contenido de los años 2010.'],
            ['nombre' => 'Terror', 'descripcion' => 'Categoría relacionada con terror.'],
        ]);
    }
}
