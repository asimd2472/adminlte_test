<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Colors;
use App\Models\ManufacturingTypes;
use App\Models\Materials;
use App\Models\MaterialTypes;
use App\Models\Processes;

class ManufacturingSeeder extends Seeder
{
    public function run(): void
    {
        $json = file_get_contents(database_path('data/manufacturing.json'));
        $data = json_decode($json, true);

        // dd($data);

        foreach ($data['manufacturing_types'] as $typeData) {

            $manufacturingType = ManufacturingTypes::updateOrCreate(
                ['name' => $typeData['name']],
                []
            );

            foreach ($typeData['materials'] as $materialData) {

                $material = Materials::updateOrCreate(
                    [
                        'name' => $materialData['name'],
                        'manufacturing_types_id' => $manufacturingType->id
                    ],
                    [
                        'infill' => $materialData['infill'] ?? null
                    ]
                );

                foreach ($materialData['types'] as $type) {

                    $materialType = MaterialTypes::updateOrCreate(
                        [
                            'name' => $type['name'],
                            'material_id' => $material->id
                        ],
                        []
                    );

                    foreach ($type['colors'] ?? [] as $color) {

                        Colors::updateOrCreate(
                            [
                                'name' => $color['name'],
                                'material_type_id' => $materialType->id
                            ],
                            [
                                'code' => $color['code'] ?? null
                            ]
                        );
                    }

                    foreach ($type['processes'] ?? [] as $processName) {

                        Processes::updateOrCreate(
                            [
                                'name' => $processName,
                                'material_type_id' => $materialType->id
                            ],
                            []
                        );
                    }
                }
            }
        }
    }
}