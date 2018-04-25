<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = database_path('seeds\seeder_csv\role_seeder.csv');
        Excel::load($contents)->each(function (Collection $csvLine) {
            $role = Role::firstOrNew([
                'name' => $csvLine->get('name'),
                'slug' => $csvLine->get('slug'),
                'description'=>$csvLine->get('description')
            ]);
            $role->save();

    	});
    }
}
