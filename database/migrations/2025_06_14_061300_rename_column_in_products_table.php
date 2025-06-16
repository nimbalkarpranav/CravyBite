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
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
           
            
            $table->renameColumn('name', 'pr_name');
            $table->renameColumn('description', 'pr_description');
            $table->renameColumn('price', 'pr_price');
            $table->renameColumn('discount', 'pr_discount');
            $table->renameColumn('image', 'pr_image');
            $table->renameColumn('food_type', 'pr_food_type');
            $table->renameColumn('is_available', 'Availability');
            $table->renameColumn('is_featured', 'status');
            $table->renameColumn('tags', 'tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
