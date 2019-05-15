<?php

use Illuminate\Database\Seeder;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cats')->insert([
            'name' => 'COLOR',
            'slug' => 'color',
            'cat_id' => null,
            'type' => 0,
            'status' =>1
        ]);

        DB::table('cats')->insert([
            'name' => 'CARE',
            'slug' => 'care',
            'cat_id' => null,
            'type' => 0,
            'status' =>1
        ]);

        DB::table('cats')->insert([
            'name' => 'STYLING',
            'slug' => 'styling',
            'cat_id' => null,
            'type' => 0,
            'status' =>1
        ]);

        DB::table('cats')->insert([
            'name' => 'SMOOTHING',
            'slug' => 'smoothing',
            'cat_id' => null,
            'type' => 0,
            'status' =>1
        ]);

        DB::table('cats')->insert([
            'name' => 'PERMANENT',
            'slug' => 'permanent',
            'cat_id' => 1,
            'type' => 1,
            'status' =>1
        ]);
        DB::table('cats')->insert([
            'name' => 'LINGHTENER',
            'slug' => 'linghtener',
            'cat_id' => 1,
            'type' => 1,
            'status' =>1
        ]);
    }
}
