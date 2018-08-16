<?php

$app->post('/admin/stats', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);


    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: AdminStats | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = getAdminStats();
        if ($result != false) {
            $resultData = $result->fetch_assoc();
            return $response->withJson($resultData);
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    


});



$app->post('/admin/student/banned', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: bannedStudents | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) {
        $result = getBannedStudents();
        if ($result != false) {
            if ($result->num_rows != 0) {
                $events = array();
                while ($rawData = mysqli_fetch_assoc($result)) {
                    array_push($events, $rawData);
                }
                return $response->withJson($events);
            } else {
                return $response->withJson("NORECORD", Error::NORECORD);
                exit;
            }
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }
});

$app->post('/admin/student/active', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: activeStudents | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) {
        $result = getActiveStudents();
        if ($result != false) {
            if ($result->num_rows != 0) {
                $events = array();
                while ($rawData = mysqli_fetch_assoc($result)) {
                    array_push($events, $rawData);
                }
                return $response->withJson($events);
            } else {
                return $response->withJson("NORECORD", Error::NORECORD);
                exit;
            }
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }
});

$app->post('/admin/comments/reported', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: activeStudents | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) {
        $result = getReportedComments();
        if ($result != false) {
            if ($result->num_rows != 0) {
                $events = array();
                while ($rawData = mysqli_fetch_assoc($result)) {
                    array_push($events, $rawData);
                }
                return $response->withJson($events);
            } else {
                return $response->withJson("NORECORD", Error::NORECORD);
                exit;
            }
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }
});


$app->post('/admin/communications', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: activeStudents | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) {
        $result = getCommunications();
        if ($result != false) {
            if ($result->num_rows != 0) {
                $events = array();
                while ($rawData = mysqli_fetch_assoc($result)) {
                    array_push($events, $rawData);
                }
                return $response->withJson($events);
            } else {
                return $response->withJson("NORECORD", Error::NORECORD);
                exit;
            }
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }
});



$app->post('/admin/student/unban', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);


    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = unbanStudent($studentID);
        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    


});


$app->post('/admin/student/ban', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);


    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = banStudent($studentID);
        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    


});


$app->post('/admin/comment/delete', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $commentID = sanitize($request->getParsedBody()['commentID']);


    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = deleteComment($commentID);
        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    


});


$app->post('/admin/comment/resolve', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $commentID = sanitize($request->getParsedBody()['commentID']);


    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = resolveComment($commentID);
        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    


});

$app->post('/admin/communicate/resolve', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $communicationsID = sanitize($request->getParsedBody()['communicationsID']);


    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = resolveCommunication($communicationsID);
        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    


});






$app->post('/admin/db/check/execute', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = checkForExecution($studentID);  //President Fields needs to be empty
        if ($result != false) {
            if ($result->num_rows == 0) {
                $resultTwo = checkForWaitingExecution($studentID);
                if ($resultTwo != false) {
                    if ($resultTwo->num_rows == 0) { 
                        return $response->withJson("request");
                    } else {
                        return $response->withJson("waiting");
                    }
                } else {
                    return $response->withJson("FALSEDATA", Error::FALSEDATA);
                    exit;
                }
                
            } else if ($result->num_rows == 1) {
                return $response->withJson("execute");
            } else {
                return $response->withJson("request");
            }
            
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    

});


$app->post('/admin/db/request/reset', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = requestDBReset($studentID);  // Add President ID to President Field
        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    

});

$app->post('/admin/db/check/reset', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = checkForAuthenticate($studentID);  // Net President Field moet active wees
        
        if ($result != false) {
            $resultData = $result->fetch_assoc();
            //return $response->withJson($resultData);
            if ($resultData['count'] == '0') {
                return $response->withJson("nothing");
            } else if ($resultData['count'] == '1') {
                return $response->withJson("authenticate");
            } else {
                return $response->withJson("nothing");
            }

        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    

});

$app->post('/admin/db/request/granted', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 
        $result = grantDBReset($studentID);  // Add Vice President ID to Vice_President Field
        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    

});


$app->post('/admin/db/request/execute', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);
    $QRCode = sanitize($request->getParsedBody()['QRCode']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: studentUnban | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) { 

        if ($QRCode == 'YONYXNKW9IEUPISMVO0J') {
            //$result = executeDBReset();  // Erase the DB if both fields are full
            $result = cancelDBReset();  //Just for test
            if ($result != false) {
                return $response->withJson("success");
            } else {
                return $response->withJson("FALSEDATA", Error::FALSEDATA);
                exit;
            }
        } else {
            return $response->withJson("UNAUTHORIZED", Error::FALSEDATA);
            exit;
        }

 
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    

});