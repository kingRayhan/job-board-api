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
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location');
            $table->string('link');
            $table->string('company_name');
            $table->string('company_logo');
            $table->text('description')->nullable();

            $table->string('type');
            $table->string('primary_tag')->nullable();

            $table->boolean('highlighted')->default(false);
            $table->boolean('pinned')->default(false);

            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
