<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'title' => 'Construction école',
            'image' => 'portfolio/portfolio-01.jpg',
            'description' => 'Industrial Objects, Offices',
            'category' => 'Electronics',
        ]);

        Portfolio::create([
            'title' => 'Imprimerie numérique',
            'image' => 'portfolio/portfolio-02.jpg',
            'description' => 'Buildings, Urban Areas',
            'category' => 'Architecture',
        ]);

        Portfolio::create([
            'title' => 'Aménagement',
            'image' => 'portfolio/portfolio-03.jpg',
            'description' => 'Art, Creative Works',
            'category' => 'Art',
        ]);
        Portfolio::create([
            'title' => 'Construction',
            'image' => 'portfolio/portfolio-04.jpg',
            'description' => 'Art, Creative Works',
            'category' => 'Art',
        ]);
        Portfolio::create([
            'title' => 'Néttoyage',
            'image' => 'portfolio/portfolio-05.jpg',
            'description' => 'Art, Creative Works',
            'category' => 'Art',
        ]);
        Portfolio::create([
            'title' => 'Entretien',
            'image' => 'portfolio/portfolio-06.jpg',
            'description' => 'Art, Creative Works',
            'category' => 'Art',
        ]);
    }
}
