<?php

    $connection;

    $hostname = "197.242.151.164";
    $username = "howldpst";
    $password = "H9{hP-0j-q0r";
    $database = "howldpst_bcofficial";


    mysqli_report(MYSQLI_REPORT_STRICT);

try {
    $connection = new mysqli($hostname, $username, $password, $database);
} catch (Exception $e) {
    $data['code'] = "99";
    $data['message'] = "Connection Error";
    $data['info'] = $e->getMessage();
    echo "[".json_encode($data)."]";
    exit;
}
    

if (isset($_POST['disconnect'])) {
    $connection->close();
}