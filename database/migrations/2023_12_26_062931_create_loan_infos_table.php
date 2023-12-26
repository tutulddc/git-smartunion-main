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
        Schema::create('loan_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('loan_conf'); // Integer column
            $table->string('loan_unique_id'); // string column
            $table->integer('union_id'); // Integer column
            $table->integer('ward_number'); // Integer column
            $table->integer('holding_number'); // Integer column
            $table->string('khana_id'); // Integer column
            $table->string('khana_person_name'); // String column
            $table->string('khana_person_unique_id'); // String column, be created
            $table->integer('khana_person_type'); // integer column
            $table->integer('nid_number'); // integer column
            $table->integer('loan_type'); // integer column
            $table->integer('loan_dept'); // integer column
            $table->integer('loan_amount'); // integer column
            $table->string('loan_duration'); // integer column
            $table->integer('loan_present_cond'); // integer column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_infos');
    }
};
