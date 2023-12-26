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
        Schema::create('other_benefits', function (Blueprint $table) {
            $table->id();
            $table->integer('oth_benefit_conf'); // Integer column
            $table->string('oth_benefit_unique_id'); // string column
            $table->integer('union_id'); // Integer column
            $table->integer('ward_number'); // Integer column
            $table->integer('holding_number'); // Integer column
            $table->string('khana_id'); // Integer column
            $table->string('khana_person_name'); // String column
            $table->string('khana_person_unique_id'); // String column, be created
            $table->integer('khana_person_type'); // integer column
            $table->integer('nid_number'); // integer column
            $table->integer('housing'); // integer column
            $table->integer('gr_benefit'); // integer column
            $table->integer('tin_benefit'); // integer column
            $table->integer('blanket_benefit'); // integer column
            $table->integer('tcb_benefit'); // integer column
            $table->integer('fifteentaka_benefit'); // integer column
            $table->integer('thirtytaka_benefit'); // integer column
            $table->integer('benefit_deserve'); // integer column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_benefits');
    }
};
