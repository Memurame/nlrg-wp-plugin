<?php

namespace NLRG\ChurchTools;

class RestApi {

    const API_URL_TEMPLATE = 'https://%s/api/';

    private  $token;
    private  $guzzleClient;
    private  $churchURL;

    function __construct(string $churchURL, string $token = null){
        $this->guzzleClient = new \GuzzleHttp\Client([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Login ' . $token,
                'Accept' => 'application/json',
        ]
    ]);
    $this->token = $token;
    $this->churchURL = $churchURL;
  }

  public function getWhoami(){

        return $this->callApi('get', 'whoami');

  }

  public function getInfo(){

        return $this->callApi('get', 'info');
      
  }

  public function getEvents(string $date = null, $count = 6, $filter = null){

        $s_d = new \DateTime('now');
        if(!empty($date)){
            $s_d->setDate(substr($date, 0, 4), substr($date, 4, 2), substr($date, 6, 2));
        }
        
        $e_d = new \DateTime('now');
        if(!empty($date)){
            $e_d->setDate(substr($date, 0, 4), substr($date, 4, 2), substr($date, 6, 2));
        }
        $e_d->modify('+' . $count .' month');

        $response = $this->callApi('get', 'events?from=' . $s_d->format('Y-m-d') . '&to=' . $e_d->format('Y-m-d'));

        if(empty($filter)){
            return $response;
        } else {
            

            return $response;
        }




  }

  private function callApi(string $method, string $apiRoute, array $data = []){

        $response = $this->guzzleClient->request($method,$this->getApiUrl($apiRoute), $this->getRequestOptions());

        if ($response->getStatusCode() != 200) {
            die("Fehler");
        }

            
        if(isset($response)){
            $rawData = (string)$response->getBody();
            $data = json_decode($rawData, true);

            print_r($data);
        }

        return $data;
  }
  
  private function getRequestOptions(array $parameters = []){
      
        return $parameters;
  }
  private function getApiUrl(string $route): string{
        return sprintf(self::API_URL_TEMPLATE . '%s', $this->churchURL, $route);
  }

}

?>
