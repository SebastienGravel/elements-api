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
        Schema::create('elements', function (Blueprint $table) {
            $table->id();
            $table->string('mass');
            $table->integer('neutron');
            $table->string('name', 50);
            $table->string('slug', 50);
            $table->string('symbol', 2);
            $table->integer('period');
            $table->integer('group');
            $table->string('distribution', 50);
            $table->foreignId('elements_states_id')->constrained()->cascadeOnDelete();
            $table->foreignId('elements_families_id')->constrained()->cascadeOnDelete();
            $table->string('occurence', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elements');
    }
};
