<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNacionalidadeIdToAutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('autors', function (Blueprint $table) {
            $table->foreignId('nacionalidade_id')->constrained('nacionalidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('autors', function (Blueprint $table) {
            $table->foreignId('nacionalidade_id')->constrained('nacionalidades');
        });
    }
}
