<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('travel_plans', function (Blueprint $table) {
        $table->id();

        $table->foreignId('destination_id')
              ->constrained('destinations')
              ->onDelete('cascade');

        $table->integer('day');
        $table->time('time');
        $table->string('activity');
        $table->string('location')->nullable();
        $table->text('description')->nullable();

        $table->timestamps();
    });
}
};
