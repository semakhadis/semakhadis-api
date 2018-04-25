<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Http\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = database_path('seeds\seeder_csv\tag_seeder.csv');
        Excel::selectSheets('tag_seeder')->load($content, function ($csvLine) {
            foreach($csvLine->all() as $tag_data){
                $tag = tag::firstOrNew([
                    'tag' => $tag_data->tag,
                    'slug' => $tag_data->slug,
                ]);
                $tag->save();
            }
        });

    }
}
