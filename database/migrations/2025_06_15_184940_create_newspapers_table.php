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
        Schema::create('newspapers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the newspaper');
            $table->string('original_url')->comment('Original URL of the newspaper');
            $table->string('arquivo_pt_url')->nullable()->comment('URL of the newspaper on arquivo.pt');

            $table->foreignId('freguesia_pt_entry_id')
                ->nullable()
                ->constrained('freguesias_pt_entries')
                ->onDelete('cascade')
                ->comment('ID of the freguesia.pt entry this newspaper belongs to');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers');
    }
};
