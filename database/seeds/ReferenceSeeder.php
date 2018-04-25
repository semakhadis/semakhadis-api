<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Http\Models\Reference;

class ReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = database_path('seeds\seeder_csv\reference_seeder.csv');
        Excel::selectSheets('reference_seeder')->load($content, function ($csvLine) {
            foreach($csvLine->all() as $reference_data){
                $reference = Reference::firstOrNew([
                    'title' => $reference_data->title,
                    'slug' => $reference_data->slug,
                    'description'=>$reference_data->description,
                    'author'=>$reference_data->author,
                ]);
                $reference->save();
            }
        });
    }
}
