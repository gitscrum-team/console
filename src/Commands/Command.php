<?php

namespace GitScrum\Console\Commands;

use Illuminate\Console\Command as ConsoleCommand;
use GitScrum\Console\Services\HttpClient;

class Command extends ConsoleCommand
{
  public $http;

  public function __construct()
  {
  
    $this->http = new HttpClient;
    parent::__construct();
  
  }
  
  public function auth()
  {
  
    if (!$this->http->isLogged()) {
      $this->call('gitscrum:signin');
      return ;
    }
  
  }
}
