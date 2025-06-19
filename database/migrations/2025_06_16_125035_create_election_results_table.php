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
        Schema::create('election_results', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->integer('number_votes')->unsigned();
            $table->decimal('percentage_votes', 5, 2)->unsigned();

            $table->foreignId('election_id')
                ->constrained('elections')
                ->onDelete('cascade');

            $table->foreignId('party_id')
                ->constrained('parties')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_results');
    }
};
