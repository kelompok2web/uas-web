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
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kriteria')->nullable();
            $table->string('status')->nullable();
            $table->float('bobot', 5, 2)->nullable();
            $table->enum('tipe_data', ['Float', 'Crips','Integer']);
            $table->unsignedBigInteger('crips_id')->nullable();
            $table->timestamps();

            $table->foreign('crips_id')
                ->on('crips')
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
        Schema::dropIfExists('kriteria');
    }
};
