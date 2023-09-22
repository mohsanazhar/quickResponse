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
        Schema::table('users', function (Blueprint $table) {
            $table->string('emerg_contact_name')->nullable()->after('ticktock');
            $table->string('emerg_contact_mail')->nullable()->after('emerg_contact_name');
            $table->string('employer_number')->nullable()->after('employer');
            $table->string('kin_contact_number')->nullable()->after('kin_name');
            $table->string('payment_status')->default('unpaid')->after('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('emerg_contact_name');
            $table->dropColumn('emerg_contact_mail');
            $table->dropColumn('employer_number');
            $table->dropColumn('kin_contact_number');
            $table->dropColumn('payment_status');
        });
    }
};
