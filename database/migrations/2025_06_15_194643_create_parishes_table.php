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
        Schema::create('parishes', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->foreignId('city_id')
                ->constrained('cities')
                ->onDelete('cascade')
                ->comment('ID of the city this parish belongs to');

            $table->magellanGeometry('old_geo_polygon')
                ->nullable()
                ->comment('Geographical polygon of the parish');

            $table->magellanPoint('old_polygon_centroid')
                ->nullable()
                ->comment('Centroid point of the parish polygon');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parishes');
    }
};
