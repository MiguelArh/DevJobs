<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salarios')->insert([
            'nombre'=>' 0 - 100 USD',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('salarios')->insert([
            'nombre'=>'200 - 400 USD',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('salarios')->insert([
            'nombre'=>'500 - 1000 USD',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('salarios')->insert([
            'nombre'=>'No mostrar',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        
        
    }
}
