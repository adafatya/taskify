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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('project_id');
            $table->string('task_title');
            $table->text('task_description');
            $table->date('task_due_date');
            $table->uuid('asignee_id')->nullable();
            $table->string('status');
            $table->boolean('is_deleted');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('asignee_id')->references('id')->on('users');
            $table->index('is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
