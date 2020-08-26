<?php

namespace GitScrum\Console\Commands;


use GitScrum\Console\Services\Essentials;
use Illuminate\Support\Str;

class MyNextTasks extends Command
{

  protected $signature = 'gitscrum:my-next-tasks';

  protected $description = 'GitScrum - My Next Tasks';

  private $tasks;

  public function handle()
  {

    $this->auth();

    (new Essentials)->clear();

    $rows = $this->getTasks();
    $this->createTable($rows);
    $this->createAsk($rows);

  }

  private function getTasks()
  {

    $this->tasks = $this->http->get('tasks', 'assignee=me&workflow=open&page=1');

    return collect($this->tasks)->map(function ($task) {

      return [
        str_replace('#', '', $task->code),
        Str::limit($task->title, 65),
        $task->workflow->title
      ];
    })->toArray();

  }

  private function createTable($rows, $headers = ['Code', 'Title', 'Workflow'])
  {

    $this->line('
| 
|   My Next Tasks
|   
|   Let us know the task you want to see the details
|');

    $this->table($headers, $rows);

  }

  private function createAsk($rows)
  {

    $codes = collect($rows)->map(function ($item) {
      return str_replace('#', '', $item[0]);
    })->toArray();

    $response = $this->anticipate('What is the Code? Or type "menu" to see other options', $codes);

    $task = collect($this->tasks)->filter(function ($task) use ($response) {

      return str_replace('#', '', $task->code) == $response;

    })->values()->all();
        
    if ( $response == 'menu' ){
      $this->call('gitscrum:menu');
    } else {
      if ( !empty($task[0]) ){
        $this->call('gitscrum:task', ['uuid' => $task[0]->uuid]);
      }
    }

  }

}
