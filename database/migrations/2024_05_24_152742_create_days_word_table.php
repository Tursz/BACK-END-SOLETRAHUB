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
        Schema::create('day_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_1');
            $table->string('letter_2');
            $table->string('letter_3');
            $table->string('letter_4');
            $table->string('letter_5');
            $table->string('letter_6');
            $table->string('letter_7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_letters');
    }
};
