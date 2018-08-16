<?php

function sendResponse($code, $message, $info)
{
    $data['code'] = $code;
    $data['message'] = $message;
    $data['info'] = $info;
    echo "[".json_encode($data)."]";
}

function sanitize($string)
{
    $string = trim($string);
    return filter_var($string, FILTER_SANITIZE_STRING);
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 0) {
        return $min; // not so random...
    }
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

function getToken($length = 32)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet = "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    for ($i=0; $i<$length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, strlen($codeAlphabet))];
    }
    return $token;
}

function logPostToFile($type, $data)
{
    if ($type == "signin") {
        date_default_timezone_set('UTC');
        $myfile = fopen("loginPostData.txt", "a") or die("Unable to open file!");
        fwrite($myfile, date("Y-m-d | H:i")." | ".$data.PHP_EOL);
        fclose($myfile);
    } else if ($type == "signout") {
        date_default_timezone_set('UTC');
        $myfile = fopen("signoutPostData.txt", "a") or die("Unable to open file!");
        fwrite($myfile, date("Y-m-d | H:i")." | ".$data.PHP_EOL);
        fclose($myfile);
    } else if ($type == "log") {
        date_default_timezone_set('UTC');
        $myfile = fopen("logPostData.txt", "a") or die("Unable to open file!");
        fwrite($myfile, date("Y-m-d | H:i")." | ".$data.PHP_EOL);
        fclose($myfile);
    } else if ($type == "dump") {
        $myfile = fopen("dump.txt", "a") or die("Unable to open file!");
        ob_start();
        var_dump($_FILES);
        echo '\n';
        var_dump($_POST);
        $result = ob_get_clean();
        fwrite($myfile, $result);
        fclose($myfile);
    }
}

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AAAAs9PoFec:APA91bEVei0PohgJ6i62QsEusoLfgjz5_waHaXQDPnm6NSv0sC-MlKpnlAgHHvVydD-2GupwW2hEYjuxVv5RHnEmukKDCMjfJFjUGOrMOVoCsDHV0W0MTu6zwiXpbxXcJSnGZQdT7BGn' );

function sendAnnouncementNotifications($message, $title, $registrationIDs ) {


    //$registrationIds = $registrationIDs;
    // prep the bundle
    $msg = array
    (
        'body' 	=> $message,
        'title'		=> $title
    );
    $fields = array
    (
        'notification'		=> $msg,
        'registration_ids' 	=> $registrationIDs
    );
     
    $headers = array
    (
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
    );
     
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );
    
    return $fields ;

}

function createGUID()
{
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function checkBadWords($text, $badwordsSQL) {

    $words = array();
    $words = array_map('trim',explode(" ",strtolower($text)));

    $badwords = array();

    if ($badwordsSQL != false) {
        while($row = mysqli_fetch_array($badwordsSQL)){
            array_push($badwords, strtolower( $row['word']));
        }

        foreach ($words as $word) {
            if (in_array($word, $badwords) !== false) {
                return array("result" => true, "word" => $word);
            }
        }
        return false;
    } else {
        return false;
    }


}





















