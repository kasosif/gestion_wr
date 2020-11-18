<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'avatar'=>'user-1.jpg',
            'nom'=>'Halioui ',
            'prenom'=>'Jazem',
            'telephone'=>'55562971',
            'poste'=>'Administrateur',
            'is_valid'=>1,
            'adresse'=>'Tunis, Centre ville',
            'date_embauche'=>'2010-03-17',
            'role'=>'admin',
            'email'=>'admin@wr.me',
            'email_verified_at'=>'2020-11-15 23:00:00',
            'password'=>'$2y$10$EIDIDB0jSbUxziA5DiTseO/zZfNREHZNneel/LcQdftRE.u.v9q/W',
            'remember_token'=>'lyunXQKi5PvTAdLM1XGmbIQ2uqZjbsnwE5jGWSU0lPsOHkTtIJVAgOxHpgWG',
            'created_at'=>'2020-11-15 23:00:00',
            'updated_at'=>NULL
        ] );
    }
}
