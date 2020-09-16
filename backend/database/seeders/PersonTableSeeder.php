<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personModel = new Person;
        $personModel->name = "Chris";
        $personModel->lastname = "Cornell";
        $personModel->save();

        $secondPersonModel = new Person;
        $secondPersonModel->name = "Eddie";
        $secondPersonModel->lastname = "Vedder";
        $secondPersonModel->save();
    }
}
