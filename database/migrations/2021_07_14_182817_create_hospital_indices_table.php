<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Indice;
use App\Models\HospitalIndice;

class CreateHospitalIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_indices', function (Blueprint $table) {
            $table->unsignedBigInteger("hospital_id");
            $table->unsignedBigInteger("indice_id");
            $table->timestamps();
        });

        Schema::table('hospital_indices', function (Blueprint $table) {
            $table->primary(['indice_id','hospital_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_indices');
    }
}
