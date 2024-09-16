<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Functions\Helper;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');

        foreach ($comics as $comic) {
            $NewComic = new Comic();
            $NewComic->title = $comic['title'];
            $NewComic->description = $comic['description'];
            $NewComic->thumb = $comic['thumb'];
            $NewComic->price = $comic['price'];
            $NewComic->series = $comic['series'];
            $NewComic->sale_date = $comic['sale_date'];
            $NewComic->type = $comic['type'];
            $NewComic->slug = Helper::generateSlug($comic['title'], Comic::class);
            $NewComic->save();
        }

    }
}
