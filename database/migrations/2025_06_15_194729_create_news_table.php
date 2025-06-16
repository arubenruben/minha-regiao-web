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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->integer('year')
                ->comment('Year of the news');

            $table->string('title')
                ->comment('Title of the news');

            $table->text('content')
                ->comment('Content of the news');

            $table->string('arquivo_pt_url')
                ->comment('URL of the news on arquivo.pt');

            $table->string('original_url')
                ->comment('Original URL of the news, if available');

            $table->foreignId('election_id')
                ->constrained('elections')
                ->onDelete('cascade')
                ->comment('ID of the election this news belongs to');

            $table->foreignId('freguesia_pt_entry_id')
                ->nullable()
                ->constrained('freguesia_pt_entries')
                ->onDelete('cascade')
                ->comment('ID of the freguesia.pt entry this news belongs to');

            $table->foreignId('newspaper_id')
                ->references('id')
                ->on('newspapers')
                ->onDelete('cascade')
                ->comment('ID of the newspaper this news belongs to');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
