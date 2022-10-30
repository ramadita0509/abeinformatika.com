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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_invoice')
                    ->constrained('statuses')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->text('Invoice');
            $table->text('BiayaServis');
            $table->text('BiayaPart');
            $table->text('HargaModal')->nullable();
            $table->text('BiayaTotal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
