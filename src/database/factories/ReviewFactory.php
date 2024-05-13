<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hasImage = $this->faker->boolean();
        $data = [
            'user_id' => $this->faker->numberBetween(3, 5),
            'store_id' => Store::inRandomOrder()->first()->id,
            'evaluation' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->realText(100),
        ];
        if ($hasImage) {
            $imageDirectory = Storage::disk('public')->path('images');
            $imagePaths = glob($imageDirectory . '/*');
            $randomImagePath = $imagePaths[array_rand($imagePaths)];

            $relativeImagePath = str_replace(storage_path('app/public/images/'), '', $randomImagePath);
            $data['image'] = 'storage/images/' . $relativeImagePath;
        } else {
            $data['image'] = null;
        }

        return $data;
    }
}
