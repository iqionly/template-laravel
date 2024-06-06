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
        Schema::create('userables', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->char('userable_id', 36);
            $table->string('userable_type');
            $table->tinyText('description')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'userable_id', 'userable_type']); // Uniquing to one user have just one ownering data in that table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userables');
    }
};
