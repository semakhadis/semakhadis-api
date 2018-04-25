<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = database_path('seeds\seeder_csv\user_seeder.csv');
        Excel::load($contents)->each(function (Collection $csvLine) {
            $user = User::firstOrNew([
                'name' => $csvLine->get('name'),
                'email' => $csvLine->get('email'),
                'fullname'=>$csvLine->get('fullname'),
                'roles_id'=>$csvLine->get('roles_id'),
            ]);
            $user->password = bcrypt(explode('@',$csvLine->get('name'))[0] . '18!');
            $user->save();

    	});
    }
}
