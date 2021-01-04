<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->references('id')->on('users');
            $table->foreignId('expense_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->references('id')->on('expenses');
            $table->foreignId('recipient')->constrained()->onDelete('cascade')->onUpdate('cascade')->references('id')->on('users');
            $table->float('cost',12,2)->comment('۱۲ رقمی با ۲ رقم اعشار');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts');
    }
}
