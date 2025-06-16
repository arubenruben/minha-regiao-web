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
        Schema::create('wikipedias', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Title of the Wikipedia entry');
            $table->string('url')->comment('URL of the Wikipedia entry');
            $table->string('summary')->comment('Summary of the Wikipedia entry');
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
