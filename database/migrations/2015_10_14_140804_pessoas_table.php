<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome')->unique();
            $table->string('sexo');
            $table->string('nascimento');
            $table->string('responsavel');
            $table->string('email');
            $table->string('tel-fixo');
            $table->string('tel-celular');
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_grupo')->references('id')->on('grupos');
            $table->integer('id_programa')->unsigned();
            $table->foreign('id_programa')->references('id')->on('programas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pessoas');
    }
}
