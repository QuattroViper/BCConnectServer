<?php 

$app->get('/settings', function($request, $response) { 

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: menuSettings | TOKEN: NONE'); }

    // Get the settings from SQL 
    $result = getSettings();
    if ($result != false) {
        if ($result->num_rows == 1) {
            $resultData = $result->fetch_assoc();
            return $response->withJson($resultData);
        } else {
            return $response->withJson("NORECORD", Error::NORECORD);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::FALSEDATA);
        exit;
    }

});