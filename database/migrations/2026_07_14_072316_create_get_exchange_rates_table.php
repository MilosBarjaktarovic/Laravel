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
        Schema::create('get_exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->string('currency', 10);
            $table->decimal('value', 10);
            $table ->date('date');
            $table->timestamps();
            $table->unique(['currency', 'date']);

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_exchange_rates');
    }
};
