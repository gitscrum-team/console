<?php

namespace GitScrum\Console\Commands;

use GitScrum\Console\Services\HttpClient;
use Illuminate\Support\Facades\Storage;

class Signin extends Command
{

  protected $signature = 'gitscrum:signin';

  protected $description = 'GitScrum - Sign in';

  public function handle()
  {
    
    if (!(new HttpClient)->isLogged()) {

      $this->banner();
      $this->getCredentials();
      return;

    } else {

      $this->line('');
      $this->info('You are authenticated');
      $this->line('');
    
    }

  }

  private function getCredentials()
  {
    $this->info('Let us know your credentials to authenticate you on GitScrum');

    $email = $this->ask('What is your email ? ');
    $password = $this->secret('What is your password ? ');

    $this->storeData($email, $password);
  }

  private function storeData($email, $password)
  {

    $response = $this->http->post('auth/login', [
      'email' => $email,
      'password' => $password,
    ]);

    if (empty($response)) {
      
      $this->error("\n\r\n\r" . '  There was an error with your credentials. Try again.' . "\n\r");
      $this->info('');
      
      if ($this->confirm('Do you want to try again ? ')) {
        $this->getCredentials();
      }

      return ;

    }

    Storage::disk(config('gitscrum.storage_disk'))->put('gitscrum.token', $response->access_token);
    Storage::disk(config('gitscrum.storage_disk'))->put('gitscrum.user', json_encode($response->user));

    $this->info('You have been successfully authenticated');
    
  }

  private function banner(){

    $this->info('

                                     ▄█████▄
                                    ██▀╡▒╚██▌  ,▄███▄
                                    ██╙╙╙╠╠██ ▄██╠╚╠██▌
                                    ██   ▐╟█▌ ██▒▒▒▒╚██
                                   ▐██   Å██Ö ██   ╚╣██
                                    █▌  ]██▌ ]██   j╟█▌
                                   ██   ██▌  ╟█▌   ▐██ 
                                  ██▌  ██▌   ██    ╫█▌
                                 ██▀  ▐█▌   ╟█▌   ▐██
                               ▄██▀   ██   ▐██    ██
                            ▄▄██▀    ▐██▄▄███   ▄██
                         ▄███▀         ▀▀▀▀    ▄██
                       ▄██▀                   ██▀
                     ▄██                    ▄██ 
                    ██▀                      ██▄
                   ██▀                        ██▌
                  ██▀                          ██▄
                  █▌                            ██
                 ██        ▀█▀\      ▀█▀         █▌
                ▐█▌                             ▐██
                 █▌             ▀██▀             ██
        ▄██████████████████████████████████████████████████▄
       ██▀░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░│╟█▌
       ██░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▐█▌
       ██▒░░░░░░░░░░░░░░░░░░░░░░░░░░░Γ░░░░░░░░░░░░░░░░░░░░╟█▌
       ▐█▌░░░░░░░░░░░░░░░░░░░░░░░░░░░   φ░░░░░░░░░░░░░░░░Γ██
        ██░░░░░░░░░░░░░░░░░░░░░░░"    ,,,░░░░░░░░░░░░░░░░j█▌
        ██░░░░░░░░░░░░░░░░░░░░░      φ░░░░░░░░░░░░░░░░░░░╟█▌
         █▒░░░░░░░░░░░░░░░░░░ , φ░░░░░░░░░░░░░░░░░░░░░░Γ██
***********************************************************************************
* 
*   Welcome to GitScrum Console
*   
*   The power of project management in a few command lines.
*   Manage your project and your team\'s tasks, all through console commands.
*                                                              
*   Learn more about the GitScrum Console <https://gitscrum.com>
*
***********************************************************************************
');

  }

}
