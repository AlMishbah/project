<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "admin";
        $administrator->name = "Site Admin";
        $administrator->email = "admin@bookstore.com";
        $administrator->roles = json_encode("ADMIN");
        $administrator->password = \Hash::make("admin");
        $administrator->avatar = "tidak-di-isidulu.jpg";
        $administrator->address = "Cirebon";
        $administrator->phone = "089347432531";

        $administrator->save();

        $this->command->info("user admin berhasil di insert");

    }
}
