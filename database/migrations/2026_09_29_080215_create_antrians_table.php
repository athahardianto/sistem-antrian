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
        Schema::create('antrians', function (Blueprint $table) {
            $table->id(); // bigint, AUTO_INCREMENT, Primary Key
            $table->date('tanggal'); // date
            $table->smallInteger('no_antrian'); // smallint
            $table->enum('status', ['1', '0'])->default('0'); // enum('1', '0') dengan default '0'
            $table->dateTime('updated_date')->nullable(); // datetime, Nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrians');
    }
};
