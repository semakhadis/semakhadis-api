<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Collection;
use App\Http\Models\HadithProgressStatus;

class HadithProgressStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = database_path('seeds\seeder_csv\hadith_progress_status_seeder.csv');
        Excel::selectSheets('hadith_progress_statuses')->load($contents, function ($csvLine) {

            foreach($csvLine->all() as $progress){
                $hadith_progress_status = HadithProgressStatus::firstOrNew([
                    'status' => $progress->status,
                    'slug' => $progress->slug,
                ]);
                $hadith_progress_status->save();
            }
    	});
    }
}
