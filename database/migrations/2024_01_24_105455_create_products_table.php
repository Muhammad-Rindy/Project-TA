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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('merk');
            $table->string('type')->nullable();
            $table->string('speed');
            $table->string('plat');
            $table->string('transmition');
            $table->string('fuel');
            $table->tinyInteger('status');
            $table->string('color');
            $table->string('years_output');
            $table->longText('description');
            $table->string('location');
            $table->foreignId('company_id')->constrained('companys')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('price');
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
};