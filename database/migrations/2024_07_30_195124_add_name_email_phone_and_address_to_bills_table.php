<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameEmailPhoneAndAddressToBillsTable extends Migration
{
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            // Thêm cột nếu chưa có
            if (!Schema::hasColumn('bills', 'name')) {
                $table->string('name')->nullable()->after('user_id');
            }
            if (!Schema::hasColumn('bills', 'email')) {
                $table->string('email')->nullable()->after('name');
            }
            if (!Schema::hasColumn('bills', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            if (!Schema::hasColumn('bills', 'address')) {
                $table->string('address')->nullable()->after('phone');
            }
        });
    }

    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone', 'address']);
        });
    }
}
