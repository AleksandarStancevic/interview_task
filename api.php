<?php 

class Api {

  private $requested_data = [];
  private $url;
  private $headers = [];
  private $pages = [];
  private $councillor_ids = [];
  private $random_councillors = [];

    public function __construct($url,$headers = null ,$pages = [1]){
        $this->url = $url;
        foreach($pages as $page){
            array_push($this->pages, $page);
        }
       
        foreach($headers as $header){
            array_push($this->headers, $header);
        }
   

    }


  public function getCouncillors(){ 
    foreach($this->pages as $page){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url . '?entryDateFilter=2018/12/31&format=xml&pageNumber=' . $page); 
        $data = curl_exec($ch); 
        curl_close($ch);
        array_push($this->requested_data,simplexml_load_string($data));
         
    }

        foreach($this->requested_data as $data){
             foreach($data->councillor as $key){
             array_push($this->councillor_ids,$key->id);
         }
     }

    return $this->requested_data;  
  }

  public function getRandomCouncillor(){ 
        // $this->random_councillors = [];
        $councillors_copy = $this->councillor_ids;
        for($i = 0; $i <= 4 ;  $i++){
            $rand = mt_rand(0,count($councillors_copy)-1);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $this->url . '/' .$councillors_copy[$rand] . '?format=xml'); 
            $data = curl_exec($ch); 
            curl_close($ch);
            $parsed_data = simplexml_load_string($data);
            array_splice($councillors_copy, $rand, 1);
            $this->random_councillors[$i]['id'] = $parsed_data->id;
            $this->random_councillors[$i]['party'] = $parsed_data->party;
            $this->random_councillors[$i]['partyName'] = $parsed_data->partyName;
            $this->random_councillors[$i]['canton'] = $parsed_data->canton;
            $this->random_councillors[$i]['cantonName'] = $parsed_data->cantonName;

        }
    return $this->random_councillors;
      
 }

}

?>