<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveOldColumnsFromBillsTable extends Migration
{
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            // Xóa cột nếu tồn tại
            if (Schema::hasColumn('bills', 'phone')) {
                $table->dropColumn('phone');
            }
            if (Schema::hasColumn('bills', 'address')) {
                $table->dropColumn('address');
            }
        });
    }

    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        });
    }
}
