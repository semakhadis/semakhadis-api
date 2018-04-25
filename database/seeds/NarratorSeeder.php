<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Collection;
use App\Http\Models\Narrator;

class NarratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = database_path('seeds\seeder_csv\narrator_seeder.csv');
        Excel::selectSheets('narrator_seeder')->load($content, function ($csvLine) {

            foreach($csvLine->all() as $narrator_data){
                var_dump($narrator_data);
                $narrator = Narrator::firstOrNew([
                    'name' => $narrator_data->name,
                    'slug' => $narrator_data->slug,
                    'fullname' => $narrator_data->fullname,
                    'info' => $narrator_data->info,
                ]);
                $narrator->save();
            }
        });

    }
}
