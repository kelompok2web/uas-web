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
        Schema::create('cripsdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crips_id')->nullable();
            $table->string('deskripsi')->nullable();
            $table->unsignedBigInteger('kelompok')->nullable();
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
        Schema::dropIfExists('cripsdetails');
    }
};
