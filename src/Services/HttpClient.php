<?php

namespace GitScrum\Console\Services;

use Illuminate\Support\Facades\Storage;

class HttpClient
{

  private function getToken()
  {

    if ( !$this->hasToken() ) {
      return false;
    }

    return Storage::disk(config('gitscrum.storage_disk'))->get('gitscrum.token');

  }

  private function hasToken()
  {

    return Storage::disk(config('gitscrum.storage_disk'))->exists('gitscrum.token');
    
  }

  private function deleteToken()
  {

    Storage::disk(config('gitscrum.storage_disk'))->delete('gitscrum.token');

  }

  private function client()
  {

    return new \GuzzleHttp\Client(['headers' => $this->headers()]);

  }

  private function headers()
  {

    return [
      'Authorization' => 'Bearer ' . $this->getToken(),
    ];

  }

  private function getCredentials()
  {
    return '?api_id=' . config('gitscrum.api_id') . '&project_key=' . config('gitscrum.project_key') . '&';
  }

  public function post($suffix, $params = [])
  {

    $response = $this->client()->request('POST', config('gitscrum.api_base') . $suffix . $this->getCredentials(), [
      'form_params' => $params,
    ]);
    
    if ( $response->getStatusCode() == 200 || $response->getStatusCode() == 201 ){

      return json_decode($response->getBody()->getContents())->data;

    }

    return ;

  }

  public function get($suffix, $params = null)
  {
    
    $response = $this->client()->request('GET', config('gitscrum.api_base') . $suffix . $this->getCredentials() . $params);

    if ($response->getStatusCode() == 200 || $response->getStatusCode() == 201) {

      return json_decode($response->getBody()->getContents())->data;

    }

    return ;

  }

  public function isLogged(){

    $token = $this->hasToken();
    
    if ( !empty($token) ) {

      $response = $this->post('auth/me');
      
      if ( !empty($response) || $response->getStatusCode() == 200 ) {

        return true;

      }

    }

    $this->deleteToken();

    return false;

  }
}
