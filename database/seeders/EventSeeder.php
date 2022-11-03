<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => 'Event 1',
            'type' => 'Santa',
            'date' => '2022-12-31',
            'time' => '08:00:00',
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",

            'slug' => 'event-1',
            'image_path' => 'images/events/test-1.jpg',
            'short_description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'start_time' => '2022-12-31 08:00:00',
            'end_time' => '2023-01-04 15:00:00'
        ]);

        DB::table('events')->insert([
            'name' => 'Event 2',
            'type' => 'Pocker',
            'date' => '2022-12-15',
            'time' => '15:00:00',
            'description' => "Long text",

            'slug' => 'event-2',
            'image_path' => 'images/events/test-2.jpg',
            'short_description' => 'Short text',
            'start_time' => '2022-12-15 08:00:00',
            'end_time' => '2022-12-25 15:00:00'
        ]);
    }
}
