<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'BTP',
                'description' => 'Le Bâtiment et les Travaux Publics (BTP) englobent toutes les activités liées à la construction de bâtiments et d’infrastructures publiques comme les routes, ponts, et tunnels. Il comprend également la rénovation, la réparation et l’entretien des structures existantes.',
                'image' => 'services/btp.jpeg',
            ],
            [
                'name' => 'Gestion Immobilière',
                'description' => 'La gestion immobilière consiste à administrer et à gérer des propriétés résidentielles, commerciales ou industrielles. Elle inclut la gestion des baux, l’entretien des bâtiments, la gestion des finances, et la coordination des réparations et améliorations.',
                'image' => 'services/gestion_immobiliere.jpeg',
            ],
            [
                'name' => 'Imprimerie',
                'description' => 'Les services d’imprimerie comprennent la production de divers supports imprimés comme des brochures, des flyers, des cartes de visite, des affiches et des livres. Ils offrent également des services de personnalisation, de reliure, et de finition.',
                'image' => 'services/imprimerie.jpeg',
            ],
            [
                'name' => 'Construction Métallique',
                'description' => 'La construction métallique fait référence à l’utilisation de structures en métal pour construire des bâtiments et des infrastructures. Elle inclut la conception, la fabrication et l’assemblage de structures métalliques comme des poutres, des colonnes, et des cadres.',
                'image' => 'services/construction_metallique.jpeg',
            ],
            [
                'name' => 'Entretien',
                'description' => 'Les services d’entretien comprennent la maintenance préventive et corrective des bâtiments et équipements. Cela peut inclure le nettoyage, la réparation des installations, la vérification des systèmes de sécurité, et la gestion des aspects opérationnels quotidiens.',
                'image' => 'services/entretien.jpeg',
            ],
            [
                'name' => 'Nettoyage',
                'description' => 'Les services de nettoyage incluent le nettoyage régulier et en profondeur des espaces résidentiels, commerciaux ou industriels. Cela comprend le dépoussiérage, le lavage des sols, le nettoyage des vitres, et l’élimination des déchets.',
                'image' => 'services/nettoyage.jpeg',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'name' => $service['name'],
                'description' => $service['description'],
                'image' => $service['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
