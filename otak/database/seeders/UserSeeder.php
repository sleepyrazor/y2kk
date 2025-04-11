<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nicknames = ['User1', 'User2', 'User3', 'User4', 'User5', 'User6', 'User7', 'User8', 'User9', 'User10'];
        //
        foreach ($nicknames as $nickname) {

            $user = new User();
            $user->name = $nickname;
            $user->email = $nickname . '@gmail.com';
            $user->password = bcrypt('123');
            $user->avatar = 'default.png';
            $user->bio = 'This user has not set a bio yet.';
            $user->role = 'user';
            $user->remember_token = null;
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();
        }

    }
}
