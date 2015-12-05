<?php

use Illuminate\Database\Seeder;
use \App\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$todo = new Todo;
        for ($i=0; $i < 5; $i++) { 
            $todo->create([
                'user_id' => 1,
                'name' => 'Todo Default '.$i,
                'done'=> 0,
                'due'=>new Datetime
            ]);

        }
    }
}
