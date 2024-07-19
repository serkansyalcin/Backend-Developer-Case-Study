<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\DataService;
class TaskController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function index(){
        $tasks = $data = $this->dataService->getByConditionAndOrderBy([], ['difficulty_level' => 'DESC']);
        $developers = [
            'DEV1' => ['duration' => 45, 'difficulty_level' => 1],
            'DEV2' => ['duration' => 45, 'difficulty_level' => 2],
            'DEV3' => ['duration' => 45, 'difficulty_level' => 3],
            'DEV4' => ['duration' => 45, 'difficulty_level' => 4],
            'DEV5' => ['duration' => 45, 'difficulty_level' => 5],
        ];

        $weeks = 0;
        $developersWorkload = [];

        foreach ($developers as $dev => $capacity) {
            $developersWorkload[$dev] = [
                'capacity' => $capacity['duration'],
                'difficulty_level' => $capacity['difficulty_level'],
                'tasks' => []
            ];
        }

        while (count($tasks)) {
            $weeks++;
            
            foreach ($developersWorkload as $dev => $workload) {
                $developersWorkload[$dev]['tasks'][$weeks] = [];
            }

            foreach ($tasks as $key => $task) {
                
                foreach ($developersWorkload as $dev => $workload) {
                    
                    if ($workload['difficulty_level'] >= $task['difficulty_level'] && $workload['capacity'] >= $task['duration']) {
                        $developersWorkload[$dev]['tasks'][$weeks][] = $task;
                        $developersWorkload[$dev]['capacity'] -= $task['duration'];
                        unset($tasks[$key]);
                       // $tasks = $tasks->values();
                        break;
                    }
                }
            }

            foreach ($developersWorkload as $dev => &$workload) {
                $workload['capacity'] = $developers[$dev]['duration'];
            }
            
        }
        return view('welcome', [
            'minimum_weeks' => $weeks,
            'weekly_tasks' => $developersWorkload
        ]);
    }
}
