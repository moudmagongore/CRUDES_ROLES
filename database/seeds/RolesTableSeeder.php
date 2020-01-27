<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //supprimer les données de la  table role 
        /*Role::truncate();*/

        //quest ce quon veut quant on tape php artisan db:seed nous  ce quon veut ces créer des roles
        Role::create(['nom' => 'admin']);
        Role::create(['nom' => 'auteur']);
        Role::create(['nom' => 'utilisateur']);
    }
}


