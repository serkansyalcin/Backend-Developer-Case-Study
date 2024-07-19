<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Services\DataService;

class FetchTasksFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-tasks-from-api  {--mock_url=}';  //php artisan app:fetch-tasks-from-api  --mock_url=mock-one / php artisan app:fetch-tasks-from-api  --mock_url=mock-two

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To fetch tasks from apis.';

    protected $dataService;

    public function __construct(DataService $dataService)
    {
        parent::__construct();
        $this->dataService = $dataService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mock_url = $this->option('mock_url');
        $api_response = Http::get('https://raw.githubusercontent.com/WEG-Technology/mock/main/'.$mock_url, []);
        $api_response = json_decode($api_response, true);
        $tasks = [];
        $this->dataService->deleteWithCondition(['provider_name' => $mock_url]);
        foreach($api_response as $_task){
            $tasks[] = [
                'provider_name' => $mock_url,
                'name' => $mock_url.' Task '.array_values($_task)[0],
                'duration' => array_values($_task)[2],
                'difficulty_level' => array_values($_task)[1]
            ];
        }
        $this->dataService->storeData($tasks);
    }
}
