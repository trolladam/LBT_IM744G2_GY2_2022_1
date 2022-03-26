<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create(['name' => 'World', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'U.S.', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Technology', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Design', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Culture', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Business', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Politics', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Opinion', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Science', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Health', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Style', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
        Topic::create(['name' => 'Travel', 'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum a reiciendis inventore maxime optio minima possimus tempore, ullam nesciunt expedita sapiente.']);
    }
}
