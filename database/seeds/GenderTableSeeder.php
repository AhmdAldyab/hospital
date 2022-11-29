<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();
        $genders=[
            ['en'=>'male','ar'=>'ذكر'],
            ['en'=>'feminine','ar'=>'أنثى'],
        ];
        foreach ($genders as $g) {
            Gender::create(['name'=>$g]);
        }
    }
}
