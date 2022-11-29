<?php

use App\Models\Blood_Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blood_TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood__types')->delete();
        $blood__types=[
            'O-','O+','A-','A+','B-','B+','AB-','AB+'
        ];
        foreach ($blood__types as $blood) {
            Blood_Type::create(['name'=>$blood]);
        }
    }
}
