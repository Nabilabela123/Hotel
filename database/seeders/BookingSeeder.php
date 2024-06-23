<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'room_id' => 1,
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone' => '1234567890',
                'start_date' => '2024-06-01',
                'end_date' => '2024-06-07',
                'status' => 'waiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 2,
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone' => '0987654321',
                'start_date' => '2024-06-10',
                'end_date' => '2024-06-15',
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 3,
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'phone' => '5551234567',
                'start_date' => '2024-06-20',
                'end_date' => '2024-06-25',
                'status' => 'canceled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 1,
                'name' => 'Bob Brown',
                'email' => 'bobbrown@example.com',
                'phone' => '4449876543',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-05',
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 2,
                'name' => 'Charlie Green',
                'email' => 'charliegreen@example.com',
                'phone' => '3334567890',
                'start_date' => '2024-07-10',
                'end_date' => '2024-07-15',
                'status' => 'waiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 3,
                'name' => 'Diana White',
                'email' => 'dianawhite@example.com',
                'phone' => '2223334444',
                'start_date' => '2024-07-20',
                'end_date' => '2024-07-25',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 1,
                'name' => 'Ethan Black',
                'email' => 'ethanblack@example.com',
                'phone' => '1112223333',
                'start_date' => '2024-08-01',
                'end_date' => '2024-08-07',
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 2,
                'name' => 'Fiona Blue',
                'email' => 'fionablue@example.com',
                'phone' => '9998887777',
                'start_date' => '2024-08-10',
                'end_date' => '2024-08-15',
                'status' => 'waiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 3,
                'name' => 'George Yellow',
                'email' => 'georgeyellow@example.com',
                'phone' => '8887776666',
                'start_date' => '2024-08-20',
                'end_date' => '2024-08-25',
                'status' => 'canceled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 1,
                'name' => 'Hannah Red',
                'email' => 'hannahred@example.com',
                'phone' => '7776665555',
                'start_date' => '2024-09-01',
                'end_date' => '2024-09-07',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
