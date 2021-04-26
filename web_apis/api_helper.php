<?php

function returnResponse($status , $code,$msg , $data = array()){
    $response = ["status" =>$status,"code"=> $code, "msg" =>$msg ,"data" => $data];
    echo json_encode($response);
}

function checkHeaders($headerToken){
    $headers = getallheaders();
    $headers = array_change_key_case(getallheaders(), CASE_LOWER);
    print_r($headers);die;
    if(isset($headers['api-key'])){
        $headers['API-KEY'] = $headers['api-key'];
        unset($headers['api-key']);
    }
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


function httpGetCurlMethod($apiUrl)
{
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    $baseUrl  = API_BASE_URL;
    $url      = $baseUrl . $apiUrl;
    $curlInit = curl_init();
    curl_setopt($curlInit, CURLOPT_URL, $url);
    curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch,CURLOPT_HEADER, false);
    $curlResponse = curl_exec($curlInit);
    $curlResponse =  json_decode($curlResponse, true);
    curl_close($curlInit);
    return $curlResponse;
}

function httpPostCurlMethod($apiUrl, $params)
{
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    // $baseUrl  = 'https://ws.stage-apollo.xyz/api';

    $baseUrl  = API_BASE_URL;
    $url      = $baseUrl . $apiUrl;
    $curlInit = curl_init();

    //$postData = array("email"=>"anurag.gupta@antiersolutions.com","password"=>"qwerty@123");
    $postData = json_encode($params);
    curl_setopt($curlInit, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curlInit, CURLOPT_URL, $url);
    curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlInit, CURLOPT_HEADER, false);
    curl_setopt($curlInit, CURLOPT_POSTFIELDS, $postData);

    $curlResponse = curl_exec($curlInit);
    $curlResponse =  json_decode($curlResponse, true);
    curl_close($curlInit);
    // print_r($curlResponse); die("hiiiiii");
    return $curlResponse;
}


function getUserDataByEmail($userEmail)
{
    global $db;
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $query = $db->query(sprintf("SELECT * FROM users WHERE user_email = %s", secure($userEmail))) or _error("SQL_ERROR_THROWEN");
    $info = $query->fetch_assoc(); //echo "hhhh";print_r($info);
    return $info;
}

?>