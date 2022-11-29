<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations=[
            ['en'=>'woman','ar'=>'نسائية'],
            ['en'=>'children','ar'=>'أطفال'],
            ['en'=>'heart','ar'=>'قلبية'],
            ['en'=>'osseous','ar'=>'عظمية'],
            ['en'=>'inner','ar'=>'داخلية'],
            ['en'=>'urinary','ar'=>'بولية'],      
        ];
        foreach ($specializations as $s) {
            Specialization::create(['name'=>$s]);
        }

    }
}
