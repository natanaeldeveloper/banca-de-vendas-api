<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stand_id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();

            $table->foreign('stand_id')
                ->references('id')
                ->on('stands');

            $table->unique(['code', 'stand_id'], 'unique_column_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
