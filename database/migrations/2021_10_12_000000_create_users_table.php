<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('nis')->unique()->nullable();
            $table->string('kelas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('password');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('role');
            $table->foreignId('ekstrakulikuler_id')->unsigned()->nullable();
            $table->foreign('ekstrakulikuler_id')->references('id')->on('ekstrakulikuler');
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
        Schema::dropIfExists('users');
    }
}
