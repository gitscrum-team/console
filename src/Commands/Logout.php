<?php

namespace GitScrum\Console\Commands;

use Illuminate\Support\Facades\Storage;

class Logout extends Command
{

  protected $signature = 'gitscrum:logout';

  protected $description = 'GitScrum - Logout';

  public function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {

    Storage::disk(config('gitscrum.storage_disk'))->delete('gitscrum.token');
    Storage::disk(config('gitscrum.storage_disk'))->delete('gitscrum.user');

    $this->banner();

  }

  private function banner()
  {

    $this->line('');
    $this->info('Successful logout');
    $this->line('');
    
  }

}
