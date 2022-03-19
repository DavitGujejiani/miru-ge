<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $banner = new Banner();

        // slider banners
        $banner->factory()->count(2)->create([
            'type'                => Banner::BANNER_TYPE_SLIDER,
            'image_name'          => 'homepage-slider.jpg',
            'slider_title'        => 'Example Title',
            'slider_title_small'  => 'Example Small Title',
            'slider_title_bold'   => 'Example Bold Title',
            'slider_button_title' => 'Button Text',
            'resolution'          => '1920x530',
            'banner_description'  => 'Homepage slider',
        ]);

        // wide banner on homepage
        $banner->factory()->create([
            'type'               => Banner::BANNER_TYPE_HOMEPAGE_WIDE,
            'image_name'         => 'homepage-wide-banner.jpg',
            'resolution'         => '1410x190',
            'banner_description' => 'Homepage wide banner',
        ]);

        $banner->factory()->create([
            'type'               => Banner::BANNER_TYPE_HOMEPAGE_FIRST_OF_DOUBLE,
            'banner_description' => 'First of double banner on homepage',
        ]);

        $banner->factory()->create([
            'type'               => Banner::BANNER_TYPE_HOMEPAGE_SECOND_OF_DOUBLE,
            'banner_description' => 'Second of double banner on homepage',
        ]);

        $banner->factory()->count(6)->create([
            'type'               => Banner::BANNER_TYPE_CATEGORY,
            'banner_description' => 'Category banner',
        ]);
    }
}
