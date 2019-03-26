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
        // $this->manuallyData();
        $this->autoData();
    }

    protected function manuallyData()
    {
        $items = [
            0 => [
                'name' => 'ダミー1',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            1 => [
                'name' => 'ダミー2',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            2 => [
                'name' => 'ダミー3',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            3 => [
                'name' => 'ダミー4',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            4 => [
                'name' => 'ダミー5',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            5 => [
                'name' => 'ダミー6',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            6 => [
                'name' => 'ダミー7',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            7 => [
                'name' => 'ダミー8',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            8 => [
                'name' => 'ダミー9',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            9 => [
                'name' => 'ダミー10',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            10 => [
                'name' => 'ダミー11',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            11 => [
                'name' => 'ダミー12',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            12 => [
                'name' => 'ダミー13',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            13 => [
                'name' => 'ダミー14',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            14 => [
                'name' => 'ダミー15',
                'object' => 'ダミー',
                'description' => 'ダミー'
            ],
            15 => [
                'name' => 'ダミー16',
                'object' => 'ダミー',
                'description' => 'ダミー'
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

    protected function autoData() {
        $user = User::all()->first(); 
        for ($i=0; $i<40; $i++) {
            $item = [
                'name' => 'ダミーNo.'.$i,
                'object' => 'ダミー',
                'description' => 'ダミー'
            ];
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
