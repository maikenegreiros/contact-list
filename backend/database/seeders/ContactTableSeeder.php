<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactModel = new Contact;
        $contactModel->contact = "chris@gmail.com";
        $contactModel->id_person = 1;
        $contactModel->save();

        $secondContactModel = new Contact;
        $secondContactModel->contact = "+18545455778888";
        $secondContactModel->id_person = 1;
        $secondContactModel->save();

        $thirdContactModel = new Contact;
        $thirdContactModel->contact = "eddie@gmail.com";
        $thirdContactModel->id_person = 2;
        $thirdContactModel->save();
    }
}
