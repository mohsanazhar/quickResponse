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
        Schema::create('funds',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('payment_method');
            $table->decimal('amount',10,2)->default(0);
            $table->integer('user_id')->default(0);
            $table->string('status')->default('unpaid');
            $table->integer('approver')->default(0);
            $table->string('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funds');
    }
};
