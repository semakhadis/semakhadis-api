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
        $content = database_path('seeds\seeder_csv\user_seeder.csv');
        Excel::selectSheets('users')->load($content, function ($csvLine) {
            foreach($csvLine->all() as $user_data){
                $user = User::firstOrNew([
                    'name' => $user_data->name,
                    'email' => $user_data->email,
                    'fullname'=>$user_data->fullname,
                    'roles_id'=>$user_data->roles_id,
                ]);
                $user->password = bcrypt(explode('@',$user_data->name)[0] . '18!');
                $user->save();
            }
    	});
    }
}
