<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/feedbacks.csv'), 'r');
        $firstline = true;
        while(($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if(!$firstline) {
                Feedback::create([
                    'result_number' => $data[0],
                    'min_note' => $data[1],
                    'max_note' => $data[2],
                    'description' => $data[3]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
