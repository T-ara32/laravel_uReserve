<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $availableHour = $this->faker->numberBetween(10, 18); //10時～18時
        $minutes = [0, 30]; // 00分か 30分
        $mKey = array_rand($minutes); //ランダムにキーを取得
        $addHour = $this->faker->numberBetween(1, 3); // イベント時間 1時間～3時間

        $dummyDate = $this->faker->dateTimeThisMonth;
        $startDate = $dummyDate->setTime($availableHour, $minutes[$mKey]);
        $clone = clone $startDate; // そのままmodifyするとstartDateも変わるためコピー
        $endDate = $clone->modify('+'.$addHour.'hour');
        return [
            'name' => $this->faker->name,
            'information' => $this->faker->realText,
            'max_people' => $this->faker->numberBetween(1, 20),
            'start_date' => $dummyDate->format('Y-m-d H:i:s'),
            'end_date' => $dummyDate->modify('+1 hour')->format('Y-m-d H:i:s'),
            'is_visible' => $this->faker->boolean,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
