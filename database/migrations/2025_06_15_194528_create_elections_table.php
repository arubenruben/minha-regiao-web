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
        Schema::create('elections', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('year')->unsigned();
            $table->integer('number_participant_voters')->unsigned();
            $table->integer('number_registered_voters')->unsigned();
            $table->integer('number_blank_votes')->unsigned();
            $table->integer('number_null_votes')->unsigned();
            $table->integer('number_absentee_votes')->unsigned();

            $table->foreignId('freguesia_pt_entry_id')
                ->constrained('freguesia_pt_entries')
                ->onDelete('cascade');

            $table->index('freguesia_pt_entry_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};
