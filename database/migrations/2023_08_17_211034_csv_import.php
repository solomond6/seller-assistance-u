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
        Schema::create('csv_import', function (Blueprint $table) {
            $table->id();
            $table->string('column1');
            $table->string('column2');
            $table->string('column3');
            $table->string('column4');
            $table->string('column5');
            $table->string('column6');
            $table->string('column7');
            $table->string('column8');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csv_import');
    }
};
