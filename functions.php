<?php


function sortCouncillors($sort){

    
    $json_url = "councillors.json";
    $json = file_get_contents($json_url);
    $data = json_decode($json,true);
    $names = array();
    foreach ($data as $key => $row)
    {
        $names[$key] = $row['firstName'];
     
    }
    if($sort == 'asc'){
        array_multisort($names, SORT_ASC, $data);
    }
    if($sort  == 'desc'){
        array_multisort($names, SORT_DESC, $data);
    }
    
    return $data;
    
    }

?>