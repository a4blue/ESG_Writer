<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('webee_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->text('description_short')->nullable();
            $table->text('description_long')->nullable();
            $table->string('source_url');
            $table->string('event_url');
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('street')->nullable();
            $table->json('error_info')->default(new \Illuminate\Database\Query\Expression('(JSON_ARRAY())'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('webee_events');
    }
};
