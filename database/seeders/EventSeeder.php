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
            'slug' => 'event-1',
            'image_path' => 'images/events/test-1.jpg',
            'short_description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'description' => "<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>",
            'start_time' => '2022-12-31 08:00:00',
            'end_time' => '2023-01-04 15:00:00'
        ]);

        DB::table('events')->insert([
            'name' => 'Event 2',
            'slug' => 'event-2',
            'image_path' => 'images/events/test-2.jpg',
            'short_description' => 'Short text',
            'description' => "<p>Long text</p>",
            'start_time' => '2022-12-15 08:00:00',
            'end_time' => '2022-12-25 15:00:00'
        ]);
    }
}
