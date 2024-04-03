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
    Schema::create('postres', function (Blueprint $table) {
      $table->id();
      $table->string('nombre')->nullable(false);
      $table->float('precio', 8, 2)->nullable(false);
      $table->integer('stock')->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('postres');
  }
};
