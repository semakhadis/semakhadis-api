<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = database_path('seeds\seeder_csv\report_seeder.csv');
        Excel::load($contents)->each(function (Collection $csvLine) {
            $report = Report::firstOrNew([
                'title' => $csvLine->get('title'),
                'description' => $csvLine->get('description'),
                'reference'=>$csvLine->get('reference'),
                'status'=>$csvLine->get('status'),
                'created_by'=>$csvLine->get('created_by'),
                'rejected_by'=>$csvLine->get('rejected_by'),
                'approved_by'=>$csvLine->get('approved_by'),
            ]);
            $report->save();

    	});
    }
}
