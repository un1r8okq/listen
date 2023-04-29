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
        Schema::create('user_agents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->text('user_agent');
        });

        Schema::create('app_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->ipAddress('ip_address');
            $table->text('url');

            $table->unsignedBigInteger('user_agent_id');
            $table->foreign('user_agent_id')->references('id')->on('user_agents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_requests');
        Schema::dropIfExists('user_agents');
    }
};
