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
                $table->unsignedBigInteger( "rating_id" );
                $table->unsignedBigInteger( "spice_id" );
                $table->unsignedBigInteger( "category_id" );
                $table->string( "name" );
                $table->string( "slug" );
                $table->string( "image" );
                $table->double( "price" );
                $table->string( "description" );
                $table->double( "rating" );
                $table->json( "allergies" )->nullable();
                $table->timestamps();
                $table->foreign( 'rating_id' )->references( 'id' )->on( 'ratings' );
                $table->foreign( 'spice_id' )->references( 'id' )->on( 'spice_meter' );
                $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' );
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
