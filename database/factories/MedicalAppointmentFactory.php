<?php

namespace Database\Factories;

use App\Models\MedicalAppointment;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;
use Illuminate\Pagination\Paginator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Requests>
 */
class MedicalAppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = MedicalAppointment::class;
    
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'motive' => fake()->text(20),
            'more_details' => fake()->text(120), // password
        ];
    }

    public function delete(MedicalAppointment $medicalAppointment)
    {
        $medicalAppointment->delete();
    }

    public function boot()
    {
        Paginator::useBootstrap();
    }
}
