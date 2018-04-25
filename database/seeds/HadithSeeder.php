<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Http\Models\Hadith;

class HadithSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = database_path('seeds\seeder_csv\hadith_seeder.csv');
        Excel::load($contents)->each(function (Collection $csvLine) {
            $hadith = Hadith::firstOrNew([
                'title' => $csvLine->get('title'),
                'text_malay' => $csvLine->get('text_malay'),
                'text_arab'=>$csvLine->get('text_arab'),
                'description'=>$csvLine->get('description'),
                'status'=>$csvLine->get('status'),
                'progress_status'=>$csvLine->get('progress_status'),
                'reason_status'=>$csvLine->get('reason_status'),
                'hadith_narrators'=>$csvLine->get('hadith_narrators'), // dummy data in arrays
                'hadith_books'=>$csvLine->get('hadith_books'), // dummy data in arrays
                'created_by'=>$csvLine->get('created_by'),
                'rejected_by'=>$csvLine->get('rejected_by'),
                'approved_by'=>$csvLine->get('approved_by'),
            ]);
            $hadith->save();

    	});
    }
}
