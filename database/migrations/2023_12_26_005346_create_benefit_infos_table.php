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
        Schema::create('benefit_infos', function (Blueprint $table) {
            $table->id();
            $table->string('benefit_info_unique_id'); // Integer column
            $table->string('khana_id'); // Integer column
            $table->integer('union_id'); // Integer column
            $table->integer('ward_number'); // Integer column
            $table->integer('holding_number'); // Integer column
            $table->string('khana_person_name'); // String column
            $table->integer('nid'); // String column
            $table->string('khana_person_unique_id'); // String column, be created
            $table->integer('khana_person_type'); // String column
            $table->integer('khana_relation'); // integer column
            $table->integer('benefit_type'); // integer column
            $table->integer('benefit_confirm'); // integer column
            $table->integer('benefit_dept'); // integer column
            $table->integer('benefit_amount'); // integer column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefit_infos');
    }
};
