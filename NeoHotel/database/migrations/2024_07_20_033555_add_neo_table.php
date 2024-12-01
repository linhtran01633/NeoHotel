<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_slide', function (Blueprint $table) {
            $table->id();

            $table->string('name_vn',256);
            $table->string('name_en',256);
            $table->string('name_jp',256);

            $table->string('title_vn',256)->nullable();
            $table->string('title_en',256)->nullable();
            $table->string('title_jp',256)->nullable();
            $table->string('color_mobile',256)->nullable();

            $table->string('images',2056)->nullable();
            $table->string('images_mobile',2056)->nullable();

            $table->smallInteger('delete_flag')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('category_room', function (Blueprint $table) {
            $table->id();
            $table->string('name_vn',256);
            $table->string('name_en',256);
            $table->string('name_jp',256);

            $table->string('price_vn',256)->nullable();
            $table->string('price_en',256)->nullable();
            $table->string('price_jp',256)->nullable();

            $table->string('detail_vn',1024)->nullable();
            $table->string('detail_en',1024)->nullable();
            $table->string('detail_jp',1024)->nullable();

            $table->string('acreage_vn',256)->nullable();
            $table->string('acreage_en',256)->nullable();
            $table->string('acreage_jp',256)->nullable();

            $table->string('bed_vn',256)->nullable();
            $table->string('bed_en',256)->nullable();
            $table->string('bed_jp',256)->nullable();

            $table->string('area_vn',256)->nullable();
            $table->string('area_en',256)->nullable();
            $table->string('area_jp',256)->nullable();

            $table->string('images',2056)->nullable();

            $table->smallInteger('delete_flag')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('faq', function (Blueprint $table) {
            $table->id();
            $table->string('question_vn',256);
            $table->string('question_en',256);
            $table->string('question_jp',256);

            $table->string('answer_vn',256)->nullable();
            $table->string('answer_en',256)->nullable();
            $table->string('answer_jp',256)->nullable();

            $table->smallInteger('delete_flag')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('title1_vn',256)->nullable();
            $table->text('title1_en',256)->nullable();
            $table->text('title1_jp',256)->nullable();
            $table->text('title1_images',512)->nullable();

            $table->text('title1_sub1_vn',256)->nullable();
            $table->text('title1_sub1_en',256)->nullable();
            $table->text('title1_sub1_jp',256)->nullable();

            $table->text('title1_sub2_vn',512)->nullable();
            $table->text('title1_sub2_en',512)->nullable();
            $table->text('title1_sub2_jp',512)->nullable();

            $table->text('title1_sub3_vn',512)->nullable();
            $table->text('title1_sub3_en',512)->nullable();
            $table->text('title1_sub3_jp',512)->nullable();

            $table->text('title1_sub4_vn',512)->nullable();
            $table->text('title1_sub4_en',512)->nullable();
            $table->text('title1_sub4_jp',512)->nullable();

            $table->text('title1_sub5_vn',512)->nullable();
            $table->text('title1_sub5_en',512)->nullable();
            $table->text('title1_sub5_jp',512)->nullable();

            $table->text('title2_vn',256)->nullable();
            $table->text('title2_en',256)->nullable();
            $table->text('title2_jp',256)->nullable();

            $table->text('title2_sub1_vn',512)->nullable();
            $table->text('title2_sub1_en',512)->nullable();
            $table->text('title2_sub1_jp',512)->nullable();

            $table->text('title2_sub2_vn',512)->nullable();
            $table->text('title2_sub2_en',512)->nullable();
            $table->text('title2_sub2_jp',512)->nullable();

            $table->text('title2_sub3_vn',512)->nullable();
            $table->text('title2_sub3_en',512)->nullable();
            $table->text('title2_sub3_jp',512)->nullable();

            $table->text('title3_vn',256)->nullable();
            $table->text('title3_en',256)->nullable();
            $table->text('title3_jp',256)->nullable();

            $table->text('title3_sub1_vn',512)->nullable();
            $table->text('title3_sub1_en',512)->nullable();
            $table->text('title3_sub1_jp',512)->nullable();

            $table->text('title3_images',512)->nullable();

            $table->text('title4_vn',256)->nullable();
            $table->text('title4_en',256)->nullable();
            $table->text('title4_jp',256)->nullable();

            $table->text('title4_sub1_vn',512)->nullable();
            $table->text('title4_sub1_en',512)->nullable();
            $table->text('title4_sub1_jp',512)->nullable();

            $table->text('title4_images',512)->nullable();

            $table->smallInteger('delete_flag')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title_vn',256);
            $table->string('title_en',256);
            $table->string('title_jp',256);

            $table->string('title_sub_vn',256)->nullable();
            $table->string('title_sub_en',256)->nullable();
            $table->string('title_sub_jp',256)->nullable();

            $table->text('comment_vn')->nullable();
            $table->text('comment_en')->nullable();
            $table->text('comment_jp')->nullable();

            $table->text('service_list')->nullable();
            $table->text('images')->nullable();

            $table->smallInteger('delete_flag')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('title_vn',256);
            $table->string('title_en',256);
            $table->string('title_jp',256);

            $table->string('title_sub1_vn',256)->nullable();
            $table->string('title_sub1_en',256)->nullable();
            $table->string('title_sub1_jp',256)->nullable();

            $table->text('comment1_vn')->nullable();
            $table->text('comment1_en')->nullable();
            $table->text('comment1_jp')->nullable();

            $table->string('title_sub2_vn',256)->nullable();
            $table->string('title_sub2_en',256)->nullable();
            $table->string('title_sub2_jp',256)->nullable();

            $table->text('comment2_vn')->nullable();
            $table->text('comment2_en')->nullable();
            $table->text('comment2_jp')->nullable();

            $table->string('title_sub3_vn',256)->nullable();
            $table->string('title_sub3_en',256)->nullable();
            $table->string('title_sub3_jp',256)->nullable();

            $table->text('comment3_vn')->nullable();
            $table->text('comment3_en')->nullable();
            $table->text('comment3_jp')->nullable();

            $table->smallInteger('delete_flag')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title_vn',256);
            $table->string('title_en',256);
            $table->string('title_jp',256);

            $table->string('title1_vn',256);
            $table->string('title1_en',256);
            $table->string('title1_jp',256);

            $table->text('title1_sub1_vn')->nullable();
            $table->text('title1_sub1_en')->nullable();
            $table->text('title1_sub1_jp')->nullable();

            $table->text('comment1_vn')->nullable();
            $table->text('comment1_en')->nullable();
            $table->text('comment1_jp')->nullable();

            $table->text('title1_sub2_vn')->nullable();
            $table->text('title1_sub2_en')->nullable();
            $table->text('title1_sub2_jp')->nullable();

            $table->text('comment2_vn')->nullable();
            $table->text('comment2_en')->nullable();
            $table->text('comment2_jp')->nullable();

            $table->text('title1_sub3_vn')->nullable();
            $table->text('title1_sub3_en')->nullable();
            $table->text('title1_sub3_jp')->nullable();

            $table->text('comment3_vn')->nullable();
            $table->text('comment3_en')->nullable();
            $table->text('comment3_jp')->nullable();

            $table->text('title1_sub4_vn')->nullable();
            $table->text('title1_sub4_en')->nullable();
            $table->text('title1_sub4_jp')->nullable();

            $table->text('comment4_vn')->nullable();
            $table->text('comment4_en')->nullable();
            $table->text('comment4_jp')->nullable();

            $table->text('title1_sub5_vn')->nullable();
            $table->text('title1_sub5_en')->nullable();
            $table->text('title1_sub5_jp')->nullable();

            $table->text('comment5_vn')->nullable();
            $table->text('comment5_en')->nullable();
            $table->text('comment5_jp')->nullable();

            $table->string('title2_vn',256);
            $table->string('title2_en',256);
            $table->string('title2_jp',256);

            $table->string('title3_vn',256);
            $table->string('title3_en',256);
            $table->string('title3_jp',256);

            $table->text('equipment_for_rent')->nullable();
            $table->text('available_equipment')->nullable();

            $table->smallInteger('delete_flag')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });


        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('images',256);
            $table->string('images_mobile',256);
            $table->smallInteger('delete_flag')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
