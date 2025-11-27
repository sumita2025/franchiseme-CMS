<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageSection;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $page = Page::firstOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home',
                'meta_title' => 'Home – Franchise Growth',
                'meta_description' => 'Grow your franchise business with the right strategy.'
            ]
        );

        $sections = [
            ['hero', 'Scale Your Franchise Faster'],
            ['why_choose_us', 'Why Choose Us'],
            ['services', 'Our Services'],
            ['process', 'Our Process'],
            ['testimonials', 'Testimonials'],
        ];

        $i = 0;
        foreach ($sections as $s) {
            PageSection::firstOrCreate(
                ['page_id' => $page->id, 'section_key' => $s[0]],
                [
                    'title' => $s[1],
                    'subtitle' => null,
                    'content_html' => '<p>Update this section in CMS.</p>',
                    'image_path' => null,
                    'cta_label' => null,
                    'cta_url' => null,
                    'order_no' => $i++
                ]
            );
        }
    }
}
