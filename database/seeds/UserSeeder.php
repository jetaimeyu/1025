<?php

use Illuminate\Database\Seeder;
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
        //
        factory(User::class, 80)->create();
        $user = User::find(166);
        $user->is_admin = true;
        $user->save();
    }
}
