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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->boolean('is_default_address')->default(false);
            $table->string('tag'); // Home Office
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('phone');
            $table->string('pin_code');
            $table->string('address');
            $table->string('county');
            $table->string('city');
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
        Schema::dropIfExists('user_addresses');
    }
};
