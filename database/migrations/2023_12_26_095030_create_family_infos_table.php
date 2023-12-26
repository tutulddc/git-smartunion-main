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
        Schema::create('family_infos', function (Blueprint $table) {
            $table->id();
            $table->string('khana_id'); // Integer column
            $table->integer('union_id'); // Integer column
            $table->integer('ward_number'); // Integer column
            $table->integer('holding_number'); // Integer column
            $table->string('per_address'); // string column
            $table->integer('religion'); // Integer column
            $table->integer('poverty_margin'); // integer column
            $table->integer('yearly_income'); // integer column
            $table->integer('sanitation'); // integer column
            $table->integer('drinking_water'); // integer column
            $table->integer('fish_pond'); // integer column
            $table->string('fish_pond_area'); // integer column
            $table->integer('domestic_animal'); // integer column
            $table->integer('electricity'); // integer column
            $table->integer('race'); // integer column
            $table->integer('total_tenant'); // integer column
            $table->integer('immigrant'); // integer column
            $table->integer('motor_cycle'); // integer column
            $table->integer('rickshaw_van'); // integer column
            $table->integer('auto_van'); // integer column
            $table->integer('cng_mahindra'); // integer column
            $table->integer('easy_bike'); // integer column
            $table->integer('boat'); // integer column
            $table->integer('bus_three_wheeler'); // integer column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_infos');
    }
};
