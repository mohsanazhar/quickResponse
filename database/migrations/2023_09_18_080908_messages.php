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
        Schema::create('messages',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0);
            $table->text('recipients');
            $table->string('template_source')->default('freeform');
            $table->string('subject')->nullable();
            $table->longText('message')->nullable();
            $table->integer('template')->default(0);
            $table->string('delivery_type')->default('decease');
            $table->text('delivery_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
