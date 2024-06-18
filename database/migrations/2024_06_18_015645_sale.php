<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("sale", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("id_customer");
            $table->bigInteger("id_product");
            $table->integer("cantidad");
            $table->decimal("precio", 8, 2);
            $table->string("estado", 45);
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
        Schema::dropIfExists("sale");
    }
}
