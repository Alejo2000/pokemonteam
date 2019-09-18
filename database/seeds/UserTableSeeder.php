<?php

use Illuminate\Database\Seeder;
use Pokemon\Role;
use Pokemon\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_invitado = Role::where('name','invitado')->first();
        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user->name = 'Invitado';
        $user->email = 'Invitado@mail.com';
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_invitado);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
