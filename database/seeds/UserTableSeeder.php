<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
       
        $users = array(
            array(
                'firstname' => 'Saul',
                'middlename' => 'Good',
                'lastname' => 'Man',
                'email' => 'saulgoodman@cms.com',
                'username' => 'saul15',
                'password' => bcrypt('superadmin'),
                'mobile' => '9458278938',
                'address_id'=> 1,
                'position_id'=>1,
            ),
            array(
                'firstname' => 'Mike',
                'middlename' => 'Ehrman',
                'lastname' => 'Traut',
                'email' => 'miketraut@cms.com',
                'username' => 'mike15',
                'password' => bcrypt('municipalhworker'),
                'mobile' => '9456245938',
                'address_id'=> 2,
                'position_id'=>2,
            ),
            array(
                'firstname' => 'Nacho',
                'middlename' => 'Var',
                'lastname' => 'Ga',
                'email' => 'nachovarga@cms.com',
                'username' => 'nacho15',
                'password' => bcrypt('healthworker'),
                'mobile' => '9465429583',
                'address_id'=> 3,
                'position_id'=>3,
            )
        );
        

        foreach($users as $user){
            $this->createUser($user);
        }

    }

    private function createUser($user_data){
        $user = User::create($user_data);
        $user->save();
    }
}
