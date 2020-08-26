<?php

namespace GitScrum\Console\Services;

class Essentials
{

  public function clear()
  {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
      system('cls');
    } else {
      system('clear');
    }
  }
}
