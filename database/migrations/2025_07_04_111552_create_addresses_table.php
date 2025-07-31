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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->char('number', length: 20)->nullable();
            $table->char('extra_info', length: 60)->nullable();
            $table->char('cep', length: 9)->nullable();
            $table->char('city', length: 20)->nullable();
            $table->char('state', length: 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
