<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //supprimer la table user 
       /* User::truncate();*/

        //supprimer la relation
        /*DB::table('role_user')->truncate();*/

        //quest ce quon veut quant on tape php artisan db:seed nous  ce quon veut ces créer des utilisateurs
       $admin = User::create([
        	'nom' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('0000')
        ]);

        $auteur = User::create([
        	'nom' => 'auteur',
        	'email' => 'auteur@gmail.com',
        	'password' => Hash::make('0000')
        ]);

         $utilisateur = User::create([
        	'nom' => 'utilisateur',
        	'email' => 'utilisateur@gmail.com',
        	'password' => Hash::make('0000')
        ]);

         //On recuperer les roles dans la table roles
         $adminRole = Role::where('nom',  'admin')->first(); 
         $auteurRole = Role::where('nom',  'auteur')->first(); 
         $utilisateurRole = Role::where('nom',  'utilisateur')->first(); 

         //Et en suite on attache les roles a nos utilisateur créer en hauts
         $admin->roles()->attach($adminRole);
         $auteur->roles()->attach($auteurRole);
         $utilisateur->roles()->attach($utilisateurRole);
    }
}


