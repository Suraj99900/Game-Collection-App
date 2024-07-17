<?php
if (isset($_GET['req'])) {
    $msg =filter_var($_GET['req'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $msg_n = str_replace(" ","%20",$msg);
    $url = "http://api.brainshop.ai/get?bid=166900&key=DHIrgPIoBtOFW1Gd&uid=[uid]&msg=$msg_n";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);


    echo $result['cnt'];
    
}
