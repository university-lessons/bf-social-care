<?php

namespace Database\Seeders;

use App\Models\Demand;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->seedDemands();
    }

    private function seedDemands()
    {
        $demands = [
            [
                "description" => "Tratamento Odontológico"
            ],
            [
                "description" => "Apoio Psicológico Individual"
            ],
            [
                "description" => "Orientação Jurídica Gratuita"
            ],
            [
                "description" => "Inscrição em Programas de Transferência de Renda"
            ],
            [
                "description" => "Acompanhamento para Obtenção de Documentos"
            ],
            [
                "description" => "Oficinas de Geração de Renda"
            ],
            [
                "description" => "Encaminhamento para Serviços de Saúde Mental"
            ],
            [
                "description" => "Apoio para Inclusão no Mercado de Trabalho"
            ],
            [
                "description" => "Informações sobre Benefícios Sociais"
            ],
            [
                "description" => "Assistência Social para Famílias em Vulnerabilidade"
            ]
        ];

        foreach ($demands as $demand) {
            Demand::create($demand);
        }
    }
}
