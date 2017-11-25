<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('status')->insert([
            'name' => 'Guest',
        ]);       
        DB::table('status')->insert([
            'name' => 'S2 Preparation',
        ]);        
        DB::table('status')->insert([
            'name' => 'S2 Major Airport Endorsement',
        ]);        
        DB::table('status')->insert([
            'name' => 'S3 Preparation',
        ]);        
        DB::table('status')->insert([
            'name' => 'S3 Major Airport Endorsement',
        ]);        
        DB::table('status')->insert([
            'name' => 'C1 Preparation',
        ]);        
        DB::table('status')->insert([
            'name' => 'C1 Major Airport Endorsement',
        ]);        
        DB::table('status')->insert([
            'name' => 'S2 Refresh',
        ]);        
        DB::table('status')->insert([
            'name' => 'S3 Refresh',
        ]);        
        DB::table('status')->insert([
            'name' => 'C1 Refresh',
        ]);        
        DB::table('status')->insert([
            'name' => 'Transferring Controller',
        ]);        
        DB::table('status')->insert([
            'name' => 'Transfer from IVAO',
        ]);
    }
}
