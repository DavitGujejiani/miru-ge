<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type');
            $table->string('image_name');
            $table->string('goto_url')->nullable();
            $table->string('slider_title')->nullable();
            $table->string('slider_title_small')->nullable();
            $table->string('slider_title_bold')->nullable();
            $table->string('slider_button_title')->nullable();
            $table->string('resolution')->default(null);
            $table->string('banner_description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
}
