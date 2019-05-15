<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nguyễn Minh Dũng',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Anh Tuấn',
            'email' => 'tuanna@hrm.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Trần Văn Chung',
            'email' => 'chungtv@hrm.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Bảo Đạt',
            'email' => 'datb@hrm.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Vũ Đình Phú',
            'email' => 'ph@hrm.com',
            'password' => bcrypt('secret'),
        ]);

    }
}
