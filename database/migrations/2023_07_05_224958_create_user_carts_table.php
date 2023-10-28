<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('product_size_id')->references('id')->on('product_sizes');
            $table->foreignId('product_color_id')->references('id')->on('product_colors_images');
            $table->integer('quantity');
            $table->double('product_price')->comment('Product Price After Discount if Exists');
            $table->boolean('is_discount');
            $table->boolean('discount_value');
            $table->enum('discount_type', ['percentage', 'value']);
            $table->double('total_price');
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
        Schema::table('user_carts', function (Blueprint $table) {
            $table->dropForeign('user_carts_product_id_foreign');
            $table->dropForeign('user_carts_product_size_id_foreign');
            $table->dropForeign('user_carts_product_color_id_foreign');
        });
        Schema::dropIfExists('user_carts');
    }
};
