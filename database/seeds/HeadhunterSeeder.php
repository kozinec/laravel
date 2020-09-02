<?php

declare(strict_types=1);

use App\Models\Headhunters;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class HeadhunterSeeder extends Seeder
{
    public function run()
    {
        factory(Tag::class, 100)->create();

        factory(\App\Models\Headhunters::class, 30)->create()->each(function (Headhunters $headhunters) {
            foreach (Tag::inRandomOrder()->limit(random_int(5, 10))->get()->all() as $item) {
                /** @var Tag $item */
                $headhunters->tags()->attach($item); // присоединить

            }
        });
    }
}
