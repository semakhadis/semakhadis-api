<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Http\Models\File;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//file will be seed with the references 
     //    $contents = database_path('seeds\seeder_csv\file_seeder.csv');
     //    Excel::load($contents)->each(function (Collection $csvLine) {
     //        $narrator = Narrator::firstOrNew([
     //            'name' => $csvLine->get('name'),
     //            'fullname' => $csvLine->get('fullname'),
     //            'info'=>$csvLine->get('info'),
     //        ]);
     //        $narrator->save();

    	// });
    }
}
