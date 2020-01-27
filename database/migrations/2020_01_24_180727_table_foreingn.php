<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableForeingn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("role_user", function(Blueprint $table){
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        });


        Schema::table("role_user", function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

        
         Schema::table("articles", function(Blueprint $table){
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

        });

          Schema::table("articles", function(Blueprint $table){
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');

        });


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}



