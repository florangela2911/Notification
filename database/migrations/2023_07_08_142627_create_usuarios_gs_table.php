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
        Schema::create('usuarios_gs', function (Blueprint $table) {
           
            $table->id();
            $table->string('historia');
            $table->date('fechacita');
            $table->time('hora');
            $table->string('nombre');
            $table->string('procedim');
            $table->string('sede');
            $table->string('direccion');
            $table->string('gmail');
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
        Schema::dropIfExists('usuarios_gs');
    }
};
