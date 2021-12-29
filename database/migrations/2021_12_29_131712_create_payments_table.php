<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payer_id');// id płatnika
            $table->unsignedBigInteger('payee_id'); //id odbiorcy płatności
            $table->string('name');
            $table->enum('status', ['waiting', 'approved', 'rejected']);
            $table->float('amount');
            $table->timestamps();
            $table->foreign('payer_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->foreign('payee_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
