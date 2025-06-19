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
        Schema::create('wikipedia', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title')->comment('Title of the Wikipedia entry');
            $table->string('url')->comment('URL of the Wikipedia entry');
            $table->text('summary')->comment('Summary of the Wikipedia entry');
            $table->foreignId('freguesia_pt_entry_id')
                ->constrained('freguesias_pt_entries')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->comment('Foreign key referencing the freguesias_pt_entries table');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wikipedias');
    }
};
