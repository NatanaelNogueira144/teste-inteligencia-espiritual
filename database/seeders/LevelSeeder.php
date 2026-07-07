<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/levels.csv'), 'r');
        $firstline = true;
        while(($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if(!$firstline) {
                Level::create([
                    'name' => $data[0],
                    'min_note' => $data[1],
                    'max_note' => $data[2]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
