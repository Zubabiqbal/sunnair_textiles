<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\Page::getDefaultPages() as $page)
        {
            $title = str_slug($page);
            if(! \App\Page::where('title', $title)->exists()){
                \App\Page::create(['title' => $title]);
            }
        }

    }
}
