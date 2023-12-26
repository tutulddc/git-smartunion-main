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
        Schema::create('farmer_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('farmer_conf'); // Integer column
            $table->string('farmer_unique_id'); // string column
            $table->integer('union_id'); // Integer column
            $table->integer('ward_number'); // Integer column
            $table->integer('holding_number'); // Integer column
            $table->string('khana_id'); // Integer column
            $table->string('khana_person_name'); // String column
            $table->string('khana_person_unique_id'); // String column, be created
            $table->integer('khana_person_type'); // integer column
            $table->integer('nid_number'); // integer column

            $table->integer('farmer_type'); // integer column
            $table->integer('agro_land'); // integer column
            $table->integer('non_agro_land'); // integer column
            $table->string('main_crop'); // integer column
            $table->integer('farmer_status'); // integer column
            $table->string('agro_dept_facility'); // integer column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_infos');
    }
};
