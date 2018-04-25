<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Http\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = database_path('seeds\seeder_csv\role_seeder.csv');
        Excel::selectSheets('role_seeder')->load($content, function ($csvLine) {
            foreach($csvLine->all() as $role_data){
                $role = role::firstOrNew([
                    'name' => $role_data->name,
                    'slug' => $role_data->slug,
                    'description' => $role_data->description,
                ]);
                $role->save();
            }
        });
    }
}
