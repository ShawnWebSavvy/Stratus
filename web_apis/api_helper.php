<?php

function returnResponse($status , $code,$msg , $data = array()){
    $response = ["status" =>$status,"code"=> $code, "msg" =>$msg ,"data" => $data];
    echo json_encode($response);
}

function checkHeaders($headerToken){
    $headers = getallheaders();
    if(!isset($headers['API-KEY'])){
        return 402;
    }
    if (strcmp($headers['API-KEY'], base64_encode($headerToken)) !== 0) {
        return 400;
    }
    else {
        return 200;

    }
}

if (!function_exists('getallheaders'))
{
    function getallheaders()
    {
           $headers = [];
       foreach ($_SERVER as $name => $value)
       {
           if (substr($name, 0, 5) == 'HTTP_')
           {
               $headers[str_replace(' ', '-', strtoupper(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
           }
       }
       return $headers;
    }
}

?>