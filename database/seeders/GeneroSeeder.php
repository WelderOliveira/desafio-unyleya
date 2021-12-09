<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::truncate();

        $generos = [
            ['genero' => 'Ação e aventura'],
            ['genero' => 'Ficção afro-americana'],
            ['genero' => 'Antologias'],
            ['genero' => 'Infantil'],
            ['genero' => 'Ficção Cristã'],
            ['genero' => 'Clássicos'],
            ['genero' => 'Quadrinhos e romances gráficos'],
            ['genero' => 'Ficção científica'],
            ['genero' => 'Fantasia'],
            ['genero' => 'Distopia'],
            ['genero' => 'Ficção Policial'],
            ['genero' => 'Horror'],
            ['genero' => 'Thriller e Suspense'],
            ['genero' => 'Ficção histórica'],
            ['genero' => 'Romance'],
            ['genero' => 'Ficção Feminina'],
            ['genero' => 'LGBTQ+'],
            ['genero' => 'Ficção Contemporânea'],
            ['genero' => 'Realismo mágico'],
            ['genero' => 'Graphic Novel'],
            ['genero' => 'Conto'],
            ['genero' => 'Young adult – Jovem adulto'],
            ['genero' => 'New adult – Novo Adulto'],
            ['genero' => 'Gêneros de não ficção'],
            ['genero' => 'Memórias e autobiografia'],
            ['genero' => 'Biografia'],
            ['genero' => 'Gastronomia'],
            ['genero' => 'Arte e Fotografia'],
            ['genero' => 'Autoajuda'],
            ['genero' => 'História'],
            ['genero' => 'Viajem'],
            ['genero' => 'Crimes Reais'],
            ['genero' => 'Humor'],
            ['genero' => 'Drama'],
            ['genero' => 'Ensaios'],
            ['genero' => 'Guias & Como fazer'],
            ['genero' => 'Religião e Espiritualidade'],
            ['genero' => 'Humanidades e Ciências Sociais'],
            ['genero' => 'Paternidade e família'],
            ['genero' => 'Tecnologia e Ciência']
        ];

        foreach ($generos as $key => $genero) {
            Genero::create($genero);
        }
    }
}
