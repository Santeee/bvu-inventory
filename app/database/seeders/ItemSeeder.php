<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Facades\File;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvPath = base_path('../inventariobbdd.csv');
        
        if (!File::exists($csvPath)) {
            $this->command->error('CSV file not found at: ' . $csvPath);
            return;
        }

        $csvData = File::get($csvPath);
        $lines = explode("\n", $csvData);
        
        // Skip header row
        $header = array_shift($lines);
        
        $this->command->info('Starting to import items from CSV...');
        $count = 0;

        foreach ($lines as $line) {
            if (empty(trim($line))) continue;
            
            $data = str_getcsv($line);
            
            // Ensure we have enough columns
            if (count($data) < 19) {
                $data = array_pad($data, 19, '');
            }

            try {
                Item::create([
                    'elementos' => $data[0] ?? '',
                    'observaciones' => $data[1] ?? '',
                    'estado' => $data[2] ?? '',
                    'uso' => $data[3] ?? '',
                    'ubicacion' => $data[4] ?? '',
                    'destino' => $data[5] ?? '',
                    'observaciones_detalle' => $data[6] ?? '',
                    'movimiento' => $data[7] ?? '',
                    'fecha' => $this->parseDate($data[8] ?? ''),
                    'ubicacion_original' => $data[9] ?? '',
                    'destino_original' => $data[10] ?? '',
                    'clasificacion_ruba' => $data[11] ?? '',
                    'carga_ruba' => $data[12] ?? '',
                    'estado_general' => $data[13] ?? '',
                    'nueva_ubicacion' => $data[14] ?? '',
                    'destino_final' => $data[15] ?? '',
                    'operador' => $data[16] ?? '',
                    'fecha_actualizacion_inventario' => $this->parseDate($data[17] ?? ''),
                    'operador_carga' => $data[18] ?? '',
                ]);
                
                $count++;
                
                if ($count % 100 == 0) {
                    $this->command->info("Imported {$count} items...");
                }
            } catch (\Exception $e) {
                $this->command->error("Error importing line: " . $line);
                $this->command->error("Error: " . $e->getMessage());
            }
        }

        $this->command->info("Successfully imported {$count} items from CSV.");
    }

    /**
     * Parse date from various formats
     */
    private function parseDate($dateString)
    {
        if (empty($dateString)) {
            return null;
        }

        // Try to parse common date formats
        $formats = [
            'm/d/Y',    // 5/30/2022
            'd/m/Y',    // 30/5/2022
            'Y-m-d',    // 2022-05-30
            'd-m-Y',    // 30-5-2022
        ];

        foreach ($formats as $format) {
            $date = \DateTime::createFromFormat($format, $dateString);
            if ($date !== false) {
                return $date->format('Y-m-d');
            }
        }

        return null;
    }
}
