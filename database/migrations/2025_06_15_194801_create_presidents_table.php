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
        Schema::create('presidents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the president');
            $table->integer('term_start_year')->comment('Year the president\'s term started');
            $table->integer('term_end_year')->nullable()->comment('Year the president\'s term ended, null if still in office');
            $table->foreignId('party_id')
                ->constrained('parties')
                ->onDelete('cascade')
                ->comment('ID of the party the president belongs to');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presidents');
    }
};
