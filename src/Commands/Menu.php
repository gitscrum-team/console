<?php

namespace GitScrum\Console\Commands;

use GitScrum\Console\Services\Essentials;

class Menu extends Command
{

  protected $signature = 'gitscrum:menu';

  protected $description = 'GitScrum - Menu';

  public function __construct()
  {

    parent::__construct();

  }

  public function handle()
  {

    (new Essentials)->clear();

    $response = $this->choice('Choose an option', ['My Next Tasks', 'Exit']);

    switch ($response) {
      case 'My Next Tasks':
        $this->call('gitscrum:my-next-task');
        break;
      default:
        break;
    }

  }

}
