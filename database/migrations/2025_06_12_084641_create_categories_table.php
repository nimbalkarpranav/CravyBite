<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void {
    Schema::create('categories', function (Blueprint $table) {
        $table->bigIncrements('category_id'); // ✅ Primary Key
        $table->unsignedBigInteger('restaurant_id'); // FK
        $table->string('name');
        $table->tinyInteger('status')->default(1);
        $table->timestamps();

        $table->foreign('restaurant_id')
              ->references('id')->on('restaurants')->onDelete('cascade');
    });
}


    public function down(): void {
        Schema::dropIfExists('categories');
    }
};
