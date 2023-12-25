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
        Schema::create('khana_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('division_id'); // Integer column
            $table->integer('district_id'); // Integer column
            $table->integer('upazila_id'); // Integer column
            $table->integer('union_id'); // Integer column
            $table->integer('ward_number'); // Integer column
            $table->string('khana_id'); // Integer column
            $table->integer('holding_number'); // Integer column
            $table->string('khana_person_name'); // String column
            $table->integer('khana_person_type'); // String column
            $table->string('khana_person_unique_id'); // String column, be created
            $table->integer('khana_relation'); // integer column
            $table->string('father_name'); // String column
            $table->string('mother_name')->nullable(); // Nullable string column
            $table->string('husb_wife_name')->nullable(); // Nullable string column
            $table->string('khana_person_img')->nullable(); // String column
            $table->string('khana_house_img')->nullable(); // String column
            $table->string('pres_address'); // String column
            $table->integer('nid_number')->nullable(); // Nullable integer column
            $table->integer('birth_number')->nullable(); // Nullable integer column
            $table->integer('phone'); // Integer column
            $table->string('dob'); // String column
            $table->integer('gender'); // Integer column
            $table->integer('education'); // Integer column
            $table->integer('occupation'); // Integer column
            $table->string('passport')->nullable(); // Nullable string column
            $table->string('driving_lice')->nullable(); // Nullable string column
            $table->integer('freedom_fighter')->nullable(); // Nullable integer column
            $table->integer('ff_number')->nullable(); // Nullable integer column
            $table->integer('quater_house')->nullable(); // Nullable integer column
            $table->integer('child_education')->nullable(); // Nullable integer column
            $table->integer('primary_stipend')->nullable(); // Nullable integer column
            $table->integer('mid_stipend')->nullable(); // Nullable integer column
            $table->integer('high_stipend')->nullable(); // Nullable integer column
            $table->integer('stipend_amount')->nullable(); // Nullable integer column
            $table->integer('dropped_child')->nullable(); // Nullable integer column
            $table->integer('child_marriage')->nullable(); // Nullable integer column
            $table->integer('drag_affect')->nullable(); // Nullable integer column
            $table->integer('active_worker')->nullable(); // Nullable integer column
            $table->integer('phy_disabled')->nullable(); // Nullable integer column
            $table->integer('unemployed')->nullable(); // Nullable integer column
            $table->softDeletes(); // Soft delete column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khana_personal_infos');
    }
};
