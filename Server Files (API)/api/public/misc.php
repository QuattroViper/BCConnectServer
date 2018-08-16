<?php


$app->post('/app/version', function($request, $response) { 

    $currentVersion = sanitize($request->getParsedBody()['appVersion']);

    
    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: appVersion | Version: '.$currentVersion); }
    
    $result = getLatestAppVersion();

    if ($result != false) {
        $resultData = $result->fetch_assoc();
        $latestVersion = $resultData['version'];

        if ($currentVersion + 5 < $latestVersion){
            return $response->withJson("reallyOutdated");
        } else if ($currentVersion < $latestVersion) { 
            return $response->withJson("outdated");
        } else {
            return $response->withJson("updated");
        }
    }

});


$app->post('/app/version/student/update', function($request, $response) { 
    $currentVersion = sanitize($request->getParsedBody()['appVersion']);
    $studentID = sanitize($request->getParsedBody()['studentID']);

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: appVersionUpdate | Version: '.$currentVersion); }
    
    $result = updateStudentVersion($studentID, $currentVersion);

    if ($result != false) { 
        return $response->withJson("success");
    }
    


});