<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name' => 'Ali',
            'class' => 'Berlian',
            'level' => '2',
            'parent_contact' => '0112111111',
            'hash_value' => md5('Ali-Berlian-2-0112111111'),
        ]);

         DB::table('students')->insert([
            'name' => 'Abu',
            'class' => 'Zamrud',
            'level' => '1',
            'parent_contact' => '0113111111',
            'hash_value' => md5('Abu-Zamrud-1-0113111111'),
        ]);

         DB::table('students')->insert([
            'name' => 'Muthu',
            'class' => 'Delima',
            'level' => '3',
            'parent_contact' => '0114111111',
            'hash_value' => md5('Muthu-Delima-3-0114111111'),
        ]);
    }
}
