<?php

use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('zh_TW');

        foreach(range(1,20) as $number) {
            \App\Task::create([
                'name' => $faker->name(),
            ]);
        }
    }
}
