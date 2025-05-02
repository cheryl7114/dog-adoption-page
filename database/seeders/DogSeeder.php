<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dogs = [
            [
                'name' => 'Buddy',
                'breed' => 'Labrador Retriever',
                'size' => 'large',
                'age' => 3,
                'sex' => 'male',
                'description' => 'Buddy is a friendly and energetic lab who loves to play fetch. He gets along well with children and other dogs. He would do best in a home with a yard where he can run and play.',
                'image_path' => 'images/dogs/buddy.jpg',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Luna',
                'breed' => 'German Shepherd',
                'size' => 'large',
                'age' => 1,
                'sex' => 'female',
                'description' => 'Luna is a beautiful young shepherd with lots of potential. She is intelligent and eager to learn. She needs an experienced owner who can provide proper training and socialization.',
                'image_path' => 'images/dogs/luna.jpg',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Max',
                'breed' => 'Beagle',
                'size' => 'medium',
                'age' => 1,
                'sex' => 'male',
                'description' => 'Max is a sweet beagle who loves to follow his nose! He can be a bit stubborn but is ultimately food-motivated and trainable. He gets along well with everyone he meets.',
                'image_path' => 'images/dogs/max.jpg',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Daisy',
                'breed' => 'Yorkshire Terrier',
                'size' => 'small',
                'age' => 7,
                'sex' => 'female',
                'description' => 'Daisy is a senior Yorkie looking for a quiet home to spend her golden years. She enjoys short walks and lots of cuddle time. She would prefer to be the only pet in a calm household.',
                'image_path' => 'images/dogs/daisy.jpg',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Rocky',
                'breed' => 'Boxer',
                'size' => 'large',
                'age' => 2,
                'sex' => 'male',
                'description' => 'Rocky is a muscular but gentle boxer who loves to play. He has a lot of energy and would benefit from a home with active owners who can give him plenty of exercise.',
                'image_path' => 'images/dogs/rocky.jpg',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Charlie',
                'breed' => 'Golden Retriever',
                'size' => 'large',
                'age' => 4,
                'sex' => 'male',
                'description' => 'Charlie is a gentle soul who loves everyone he meets. He\'s well-trained and has excellent house manners. He would make a perfect family dog or companion.',
                'image_path' => 'images/dogs/charlie.jpg',
                'status' => 'adopted',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bella',
                'breed' => 'Pomeranian',
                'size' => 'small',
                'age' => 2,
                'sex' => 'female',
                'description' => 'Bella is a fluffy ball of energy! Despite her small size, she has a big personality. She loves to play with toys and would do well in a home with or without other pets.',
                'image_path' => 'images/dogs/bella.jpg',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cooper',
                'breed' => 'Australian Shepherd',
                'size' => 'medium',
                'age' => 1,
                'sex' => 'male',
                'description' => 'Cooper is a highly intelligent Aussie puppy looking for an active home. He needs mental stimulation and physical exercise. He would excel at agility or other dog sports.',
                'image_path' => 'images/dogs/cooper.jpg',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lucy',
                'breed' => 'Dachshund',
                'size' => 'small',
                'age' => 3,
                'sex' => 'female',
                'description' => 'Lucy is a sweet dachshund who loves to burrow under blankets. She\'s a loyal companion who bonds closely with her people. She needs a home with no stairs or a ramp solution.',
                'image_path' => 'images/dogs/lucy.jpg',
                'status' => 'adopted',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Duke',
                'breed' => 'Great Dane',
                'size' => 'large',
                'age' => 6,
                'sex' => 'male',
                'description' => 'Duke is a gentle giant who thinks he\'s a lap dog. Despite his size, he\'s calm and easygoing. He needs a home with enough space for his large frame but doesn\'t require excessive exercise.',
                'image_path' => 'images/dogs/duke.jpg',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('dogs')->insert($dogs);
    }
}