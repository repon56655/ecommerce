<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddtocartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addtocarts', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id");
            $table->integer("product_id");
            $table->string("name");
            $table->float("price");
            $table->string("image");
            $table->integer("quantity");
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
        Schema::dropIfExists('addtocarts');
    }
}
