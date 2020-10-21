<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Contacts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::create([
        //     "name"=>"Super Admin",
        //     "email"=>"sadmin@yat.com",
        //     "password"=>Hash::make(123456789),
        //     "role" =>"super admin",
        // ]);
        $this->call(ContactTypeSeeder::class);
        // \App\Models\User::factory(10)->create();
        // \App\Models\Supplier::factory(10)->create();
        // Brand::factory(8)->create();
        // Contacts::factory(100)->create();
       
    }
}
