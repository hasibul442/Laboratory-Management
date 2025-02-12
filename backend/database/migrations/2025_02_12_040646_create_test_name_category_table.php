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
        Schema::create('test_name_category', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->double('price')->default(0);
            $table->string('description')->nullable();
            $table->integer('status')->nullable();
            $table->string('created_by')->nullable();
            $table->foreignId('test_category_id')->constrained('test_category');
            $table->foreignId('unit_id')->constrained('lab_branchs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_name_category');
    }
};
