<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageHome extends Model
{
    protected $table = 'page_home';

    protected $fillable = [
        // HERO SECTION
        'hero_background_image',
        'hero_title',
        'hero_button_text',
        'hero_button_url',

        'hero_title_ar',
        'hero_button_text_ar',
        'hero_button_url_ar',

        // ABOUT SECTION
        'about_image',
        'about_title',
        'about_description',
        'about_button_text',
        'about_button_url',

        'about_title_ar',
        'about_description_ar',
        'about_button_text_ar',
        'about_button_url_ar',

        // VISION SECTION
        'vision_title',
        'vision_description',
        'vision_icon_image',

        'vision_title_ar',
        'vision_description_ar',

        // MISSION SECTION
        'mission_title',
        'mission_description',
        'mission_icon_image',

        'mission_title_ar',
        'mission_description_ar',

        // TEAM SECTION
        'team_title',
        'team_description',

        // TEAM Arabic fields? (If exists, you can add them)
        'team_title_ar',
        'team_description_ar',
        "team_image1",
        "team_title1",
        "team_description1",
        "team_title1_ar",
        "team_description1_ar",
        "team_image2",
        "team_title2",
        "team_description2",
        "team_title2_ar",


        // ACHIEVEMENT SECTION
        'achievement_title',
        'achievement_tag_line',
        'achievement_description',

        'achievement_title_ar',
        'achievement_tag_line_ar',
        'achievement_description_ar',

        'achievement_image',

        // COUNTER ONE
        'achievement_counter_one',
        'achievement_counter_one_en',
        'achievement_counter_one_ar',

        // COUNTER TWO
        'achievement_counter_two',
        'achievement_counter_two_en',
        'achievement_counter_two_ar',

        // COUNTER THREE
        'achievement_counter_three',
        'achievement_counter_three_en',
        'achievement_counter_three_ar',

        // COUNTER FOUR
        'achievement_counter_four',
        'achievement_counter_four_en',
        'achievement_counter_four_ar',


        // CLIENT SECTION
        'client_title',
        'client_description',

        'client_title_ar',
        'client_description_ar',

        // CLIENT LOGO IMAGES
        'client_logo_image1',
        'client_logo_image2',
        'client_logo_image3',
        'client_logo_image4',
        'client_logo_image5',
        'client_logo_image6',
        'client_logo_image7',
        'client_logo_image8',


        // STRATEGY SECTION IMAGES
        'strategy_image',
        'strategy_image_ar',

        // STRATEGY TITLE + DESCRIPTION (1 to 6)
        'strategy_title1',
        'strategy_description1',

        'strategy_title2',
        'strategy_description2',

        'strategy_title3',
        'strategy_description3',

        'strategy_title4',
        'strategy_description4',

        'strategy_title5',
        'strategy_description5',

        'strategy_title6',
        'strategy_description6',

        'strategy_title7',
        'strategy_description7',

        'strategy_title8',
        'strategy_description8',

        'strategy_title9',
        'strategy_description9',

        'strategy_title10',
        'strategy_description10',

        // STRATEGY TITLES & DESCRIPTIONS ARABIC (1–3 shown in your DB)
        'strategy_title1_ar',
        'strategy_description1_ar',

        'strategy_title2_ar',
        'strategy_description2_ar',

        'strategy_title3_ar',
        "strategy_description3_ar",

        'strategy_title4_ar',
        'strategy_description4_ar',

        'strategy_title5_ar',
        'strategy_description5_ar',

        'strategy_title6_ar',
        'strategy_description6_ar',

        'strategy_title7_ar',
        'strategy_description7_ar',

        'strategy_title8_ar',
        'strategy_description8_ar',

        'strategy_title9_ar',
        'strategy_description9_ar',

        'strategy_title10_ar',
        "strategy_description10_ar"
    ];

    protected $guarded = [];

    public function clientLogos()
    {
        return $this->hasMany(HomeClientLogo::class, 'page_home_id');
    }
}
