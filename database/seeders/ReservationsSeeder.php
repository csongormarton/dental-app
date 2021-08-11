<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'client_name' => 'Test1',
            'start'       => Carbon::parse('2021-06-08 08:00:00'),
            'end'         => Carbon::parse('2021-06-08 10:00:00'),
            'recurring'   => 'none',
            'day'         => 3,
            'duration'    => '02:00',
        ]);

        Reservation::create([
            'client_name' => 'Test2',
            'start'       => Carbon::parse('2021-01-01 10:00:00'),
            'recurring'   => 'even_week',
            'day'         => 0,
            'duration'    => '02:00',
        ]);

        Reservation::create([
            'client_name' => 'Test3',
            'start'       => Carbon::parse('2021-01-01 12:00:00'),
            'recurring'   => 'odd_week',
            'day'         => 2,
            'duration'    => '04:00',
        ]);

        Reservation::create([
            'client_name' => 'Test4',
            'start'       => Carbon::parse('2021-06-01 16:00:00'),
            'end'         => Carbon::parse('2021-11-30 20:00:00'),
            'recurring'   => 'every_week',
            'day'         => 3,
            'duration'    => '04:00',
        ]);
    }
}
