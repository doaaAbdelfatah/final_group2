<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ct = new ContactType();
        $ct->type = "Email";
        $ct->save();

        $ct = new ContactType();
        $ct->type = "Mobile";
        $ct->save();

        $ct = new ContactType();
        $ct->type = "addrees";
        $ct->save();
        
        $ct = new ContactType();
        $ct->type = "Home Phone";
        $ct->save();
    }
}
