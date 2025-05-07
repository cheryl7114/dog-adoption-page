<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdoptionRequestSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('adoption_requests')->insert([
            [
                'user_id' => 5,
                'dog_id' => 1,
                'message' => 'I would love to adopt Buddy!',
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 4,
                'dog_id' => 2,
                'message' => 'Luna would be a great fit for our family.',
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 3,
                'dog_id' => 3,
                'message' => 'Max will have a loving home with us.',
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 6,
                'dog_id' => 4,
                'message' => 'Daisy will be well cared for.',
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}