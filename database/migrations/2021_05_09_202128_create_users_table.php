<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('password');
            $table->integer('dni');
            $table->integer('celular');
            $table->integer('telefono');
            $table->unsignedBigInteger('tipo_usuario');
            $table->unsignedBigInteger('departamento')->nullable(true);
            $table->foreign('tipo_usuario')->references('id')->on('tipo_user');
            $table->foreign('departamento')->references('id')->on('departamentos');
            $table->double('sueldo_bruto');
            $table->date('fecha');
            $table->boolean('estado')->default(true);
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
