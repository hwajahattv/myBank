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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_no')->nullable()->after('email');
            $table->string('type')->nullable()->after('phone_no');
            $table->string('identity_no')->nullable()->after('type');
            $table->string('picture')->nullable()->after('identity_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_no');
            $table->dropColumn('type');
            $table->dropColumn('identity_no');
            $table->dropColumn('picture');
        });
    }
};
