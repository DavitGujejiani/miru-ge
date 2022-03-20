<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    public function definition(): array
    {
        // everything connected to slider is null, its assigned manually in seeder (only two row is dedicated to slider by default)
        return [
            'type'                => Banner::BANNER_TYPE_SLIDER,
            'image_name'          => 'general-banner.jpg', // most banners are using this image sizes (960x220)
            'goto_url'            => '#',
            'slider_title'        => null,
            'slider_title_small'  => null,
            'slider_title_bold'   => null,
            'slider_button_title' => null,
            'resolution'          => '690x220', // most banners have this resolution
            'banner_description' => $this->faker->sentence(),
        ];
    }
}
