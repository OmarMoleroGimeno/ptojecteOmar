<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->id(); // PK
            $table->foreignId('user_id')->constrained('users'); // FK a usuarios
            $table->dateTime('date');
            $table->decimal('total', 8, 2); // Total de la compra
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shoppings');
    }

}