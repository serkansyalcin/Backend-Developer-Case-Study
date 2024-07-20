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
    protected $signature = 'app:fetch-tasks-from-api {--mock_url=} {--field_mapping=}';  //php artisan app:fetch-tasks-from-api  --mock_url=mock-one --field_mapping='{"name":"<api-name-key>", "duration":"<api-duration-key>", "difficulty_level":"<api-difficulty-key>"}'

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
        $field_mapping = $this->option('field_mapping');
        $field_mapping = json_decode($field_mapping, true);
        $api_response = Http::get('https://raw.githubusercontent.com/WEG-Technology/mock/main/'.$mock_url, []);
        $api_response = json_decode($api_response, true);
        $tasks = [];
        $this->dataService->deleteWithCondition(['provider_name' => $mock_url]);
        foreach($api_response as $_task){
            $tasks[] = [
                'provider_name' => $mock_url,
                'name' => isset($field_mapping['name']) ? $_task[$field_mapping['name']] : $mock_url.' Task '.array_values($_task)[0],
                'duration' => isset($field_mapping['duration']) ? $_task[$field_mapping['duration']] : array_values($_task)[2],
                'difficulty_level' => isset($field_mapping['difficulty_level']) ? $_task[$field_mapping['difficulty_level']] : array_values($_task)[1]
            ];
        }
        $this->dataService->storeData($tasks);
    }
}
