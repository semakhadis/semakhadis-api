<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Http\Models\HadithStatus;

class HadithStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = database_path('seeds\seeder_csv\hadith_status_seeder.csv');
        Excel::selectSheets('hadith_status_seeder')->load($content, function ($csvLine) {

            foreach($csvLine->all() as $status){
                $hadith_status = HadithStatus::firstOrNew([
                    'status' => $status->status,
                    'slug' => $status->slug,
                ]);
                $hadith_status->save();
            }
        });
    }
}
