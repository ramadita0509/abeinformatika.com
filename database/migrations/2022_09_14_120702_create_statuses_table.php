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
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('Invoice');
            $table->text('RMA');
            $table->text('NamaBarang');
            $table->text('SerialNumber');
            $table->text('NamaCustomer');
            $table->text('Alamat');
            $table->text('Tlp');
            $table->text('Email');
            $table->text('Kerusakan');
            $table->text('Kelengkapan');
            $table->text('Ket');
            $table->date('Garansi');
            $table->text('Sparepart')->nullable();
            $table->text('Status');
            $table->text('NamaTeknisi')->nullable();
            $table->text('Remark')->nullable();
            $table->date('TglMasuk')->nullable();
            $table->date('TglKeluar')->nullable();
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
        Schema::dropIfExists('statuses');
    }
};
