<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Plan;


class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            0 => [
                'name' => 'ダミー1',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            1 => [
                'name' => 'ダミー2',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            2 => [
                'name' => 'ダミー3',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            3 => [
                'name' => 'ダミー4',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            4 => [
                'name' => 'ダミー5',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            5 => [
                'name' => 'ダミー6',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            6 => [
                'name' => 'ダミー7',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            7 => [
                'name' => 'ダミー8',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            8 => [
                'name' => 'ダミー9',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            9 => [
                'name' => 'ダミー10',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            10 => [
                'name' => 'ダミー11',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            11 => [
                'name' => 'ダミー12',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            12 => [
                'name' => 'ダミー13',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            13 => [
                'name' => 'ダミー14',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            14 => [
                'name' => 'ダミー15',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
            15 => [
                'name' => 'ダミー16',
                'object' => 'ダミー1',
                'description' => 'ダミー1'
            ],
        ];
        
        $user = User::all()->first();
        foreach ($items as $item) {
            $validator = \Validator::make($item, Plan::$rules);
            if ($validator->fails()) {
                $this->command->info('validation error');
                $this->command->info(var_export($item));
            }
            $plan = new Plan;
            $plan->fill($item);
            \DB::beginTransaction();
            try {
                $user->plans()->save($plan);
                $plan->skills()->sync([1,2,3,4,5]);
                \DB::commit();
            } catch (\Exception $e) {
                $this->command->info($e);
                \DB::rollback();
            }
        }
    }
}
