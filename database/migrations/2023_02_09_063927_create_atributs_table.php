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
        Schema::create('atributs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_id')->nullable();
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();

            $table->foreign('kriteria_id')
                ->on('kriteria')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
            ;

            $table->foreign('mahasiswa_id')
                ->on('mahasiswa')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atributs');
    }
};
