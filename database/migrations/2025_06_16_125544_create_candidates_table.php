<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->string('name')->comment('Name of the president');

            $table->foreignId('election_result_id')
                ->constrained('election_results')
                ->onDelete('cascade')
                ->comment('ID of the election result in which the candidate is participating');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
