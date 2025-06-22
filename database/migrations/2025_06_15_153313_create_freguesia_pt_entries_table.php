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
        Schema::create('freguesia_pt_entries', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->string('name')->comment('Name of the freguesia');
            $table->string('freguesias_pt_url')->unique()->nullable()->comment('URL of the freguesia on freguesias.pt');
            $table->string('freguesias_pt_id')->unique()->nullable()->comment('ID of the freguesia on freguesias.pt');
            $table->string('address')->nullable()->comment('Address of the freguesia');
            $table->string('email')->nullable()->comment('Email of the freguesia');
            $table->string('phone')->nullable()->comment('Phone number of the freguesia');
            $table->string('website')->nullable()->comment('Website of the freguesia');

            $table->magellanGeometry('geo_polygon')
                ->nullable()
                ->comment('Geographical polygon of the freguesia_pt_entry');

            $table->magellanPoint('polygon_centroid')
                ->nullable()
                ->comment('Centroid point of the freguesia_pt_entry polygon');

            $table->string('entity_type')->comment('Type of the entity (e.g., City, Parish)');
            $table->unsignedBigInteger('entity_id')->comment('ID of the entity this entry belongs to');
            $table->index(['entity_type', 'name']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freguesia_pt_entries');
    }
};