<?php

use Illuminate\Database\Seeder;
use App\aboutcatmodel;
class Adddummyaboutcat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title'=>'Demo Event-1'],
        	['title'=>'Demo Event-2'],
        	['title'=>'Demo Event-3'],
        	['title'=>'Demo Event-3'],
        ];
        foreach ($data as $key => $value) {
        	aboutcatmodel::create($value);
        }
    }
}
