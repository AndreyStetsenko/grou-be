<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tags;

class CreateTagsToTasks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tags::create([
            'tag' => 'Facebook',
            'tag_color' => '#3b5998'
        ]);
    }
}
