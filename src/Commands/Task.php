<?php

namespace GitScrum\Console\Commands;

use GitScrum\Console\Services\Essentials;

class Task extends Command
{

  protected $signature = 'gitscrum:task {uuid}';

  protected $description = 'GitScrum - Task';

  public function handle()
  {

    $this->auth();

    (new Essentials)->clear();

    $this->getTask($this->argument('uuid'));

  }

  private function getTask($uuid)
  {
    $this->task = $this->http->get('tasks/' . $uuid);

    $this->line('
| 
|   ** Task Details **
|   
|   Workflow: ' . $this->task->workflow->title . '
|
|   Title: ' . $this->task->title .'
|   Description: ' . $this->task->description . '
|   Type: ' . $this->task->type->title . ' / Effort: ' . $this->task->effort->title .'
|
|   Sprint: ' . ( $this->task->sprint->title ?? 'none' ) . ' 
|   User Story: ' . ( $this->task->user_story->title ?? 'none') . '
|');



  }

}
