<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToHospitals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->string("nombre");
            $table->string("telefono");
            $table->string("email");
            
            // Dirección
            $table->string("calle");
            $table->string("numero");
            $table->string("colonia");
            $table->string("codigo_postal");
            $table->string("ciudad");
            $table->string("estado");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropColumn("nombre");
            $table->dropColumn("telefono");
            $table->dropColumn("email");
            
            // Dirección
            $table->dropColumn("calle");
            $table->dropColumn("numero");
            $table->dropColumn("colonia");
            $table->dropColumn("codigo_postal");
            $table->dropColumn("ciudad");
            $table->dropColumn("estado");
        });
    }
}
