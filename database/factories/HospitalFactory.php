<?php

namespace Database\Factories;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hospital::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "url"=>"test",
            "password"=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "nombre"=>"test",
            "telefono"=>"test",
            "email"=>"test",
            "calle"=>"test",
            "numero"=>"test",
            "colonia"=>"test",
            "codigo_postal"=>"test",
            "ciudad"=>"test",
            "estado"=>"test",
        ];
    }
}
