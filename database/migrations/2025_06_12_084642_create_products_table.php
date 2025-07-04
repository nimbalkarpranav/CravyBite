<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up(): void {
    Schema::create('products', function (Blueprint $table) {
        $table->bigIncrements('product_id'); // ✅ Primary Key
        $table->unsignedBigInteger('restaurant_id'); // FK
        $table->unsignedBigInteger('category_id');   // FK to categories.category_id

        $table->string('name', 255);
        $table->text('description');
        $table->decimal('price', 10, 2);
        $table->decimal('discount', 10, 2)->nullable();
        $table->string('image', 255);
        $table->tinyInteger('is_available')->default(1);
        $table->tinyInteger('is_featured')->default(0);
        $table->string('tags', 255)->nullable();

        $table->timestamps();

        $table->foreign('restaurant_id')
              ->references('id')->on('restaurants')->onDelete('cascade');

        $table->foreign('category_id')
              ->references('category_id')->on('categories')->onDelete('cascade');
    });
}




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
