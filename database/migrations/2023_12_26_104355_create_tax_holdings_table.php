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
        Schema::create('tax_holdings', function (Blueprint $table) {
            $table->id();
            $table->string('khana_id'); // Integer column
            $table->integer('union_id'); // Integer column
            $table->integer('ward_number'); // Integer column
            $table->integer('holding_number'); // Integer column


            $table->integer('house_category'); // Integer column
            $table->integer('number_of_rooms'); // integer column
            $table->integer('house_use_type'); // integer column
            $table->integer('house_yearly_value'); // integer column
            $table->integer('land_yearly_value'); // integer column
            $table->integer('yearly_tax'); // integer column
            $table->string('final_tax'); // integer column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_holdings');
    }
};
