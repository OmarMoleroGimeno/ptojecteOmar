<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompraTable extends Migration
{
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id(); // PK
            $table->foreignId('shopping_id')->constrained('shoppings'); // FK a compras
            $table->foreignId('product_id')->constrained('products'); // FK a productos
            $table->integer('amount');
            $table->decimal('unitprice', 8, 2); // Precio unitario al momento de la compra
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('details');
    }

}
