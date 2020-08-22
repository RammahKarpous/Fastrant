<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateProductsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create( 'products', function ( Blueprint $table ) {
                $table->id();
                $table->unsignedBigInteger( "category_id" );
                $table->string( "name" );
                $table->string( "slug" );
                $table->string( "image" );
                $table->double( "price" );
                $table->string( "description", 500 );
                $table->unsignedBigInteger( "spice_id" );
                $table->json( "allergies" )->nullable();
                $table->timestamps();
                $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' );
                $table->foreign( 'spice_id' )->references( 'id' )->on( 'spice_ratings' );
            } );
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists( 'products' );
        }
    }
