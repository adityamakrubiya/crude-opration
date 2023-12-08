<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('department_id')->default('1');
            $table->string('fullname')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('state')->nullable(false);
            $table->string('gender', 10)->nullable(false);
            $table->string('hobbies', 100)->nullable(false);
            $table->string('pic')->default('default.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('registration');
    }
};
