<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( "menus_id" );
            $table->unsignedBigInteger( "categories_id" );
            $table->foreign( 'menus_id' )->references( 'id' )->on( 'menus' );
            $table->foreign( 'categories_id' )->references( 'id' )->on( 'categories' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_categories');
    }
}
