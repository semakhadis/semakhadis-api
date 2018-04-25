<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Http\Models\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = database_path('seeds\seeder_csv\report_seeder.csv');
        Excel::selectSheets('report_seeder')->load($content, function ($csvLine) {
            foreach($csvLine->all() as $report_data){
                $report = report::firstOrNew([
                    'title' => $report_data->title,
                    'email' => $report_data->email,
                    'description' => $report_data->description,
                    'status' => $report_data->status,
                    'hadiths_id' => $report_data->hadiths_id,
                    'created_by'=>$report_data->created_by
                    'closed_at'=>$report_data->closed_at
                ]);
                $report->save();
            }
        });
    }
}
