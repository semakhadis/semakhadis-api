<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Narrator;

class NarratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = database_path('seeds\seeder_csv\narrator_seeder.csv');
        Excel::load($contents)->each(function (Collection $csvLine) {
            $narrator = Narrator::firstOrNew([
                'name' => $csvLine->get('name'),
                'fullname' => $csvLine->get('fullname'),
                'info'=>$csvLine->get('info'),
            ]);
            $narrator->save();

    	});
    }
}
