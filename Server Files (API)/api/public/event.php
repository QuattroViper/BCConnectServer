<?php


$app->post('/event/events/private', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: Events | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) {
        $result = getAllEvents($token);
        if ($result != false) {
            if ($result->num_rows != 0) {
                $events = array();
                while ($rawData = mysqli_fetch_assoc($result)) {
                    array_push($events, $rawData);
                }
                //sendResponse("0", "events", json_encode($events));
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

$app->get('/event/events/public', function($request, $response) {

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: Events | TOKEN: public'); }

    // The guest is requesting
    $result = getPublicEvents();
    if ($result != false) {
        if ($result->num_rows != 0) {
            $events = array();
            while ($rawData = mysqli_fetch_assoc($result)) {
                array_push($events, $rawData);
            }
            return $response->withJson($events);
            //sendResponse("0", "events", json_encode($events));
        } else {
            return $response->withJson("NORECORD", Error::NORECORD);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::FALSEDATA);
        exit;
    }

});

$app->post('/event/open/private', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: Events | TOKEN: '.$token); }
    
        // The student is signed in
        if (doesTokenExist($token)) {
            $result = getAllOpenEvents($token);
            if ($result != false) {
                if ($result->num_rows != 0) {
                    $events = array();
                    while ($rawData = mysqli_fetch_assoc($result)) {
                        array_push($events, $rawData);
                    }
                    //sendResponse("0", "events", json_encode($events));
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

$app->get('/event/open/public', function($request, $response) {

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: Events | TOKEN: public'); }
    
    // The guest is requesting
    $result = getOpenPublicEvents();
    if ($result != false) {
        if ($result->num_rows != 0) {
            $events = array();
            while ($rawData = mysqli_fetch_assoc($result)) {
                array_push($events, $rawData);
            }
            return $response->withJson($events);
            //sendResponse("0", "events", json_encode($events));
        } else {
            return $response->withJson("NORECORD", Error::NORECORD);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::FALSEDATA);
        exit;
    }


});

$app->post('/event/interest/insert', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 
    $eventID = sanitize($request->getParsedBody()['eventID']); 

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: UpdateEventInterested | TOKEN: '.$token. " | EVENT ID: ".$eventID); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        $result = updateEventInterest($token, $eventID);
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

$app->post('/event/interest/delete', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 
    $eventID = sanitize($request->getParsedBody()['eventID']); 

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: DeleteEventInterested | TOKEN: '.$token. " | EVENT ID: ".$eventID); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        $result = deleteInterested($token, $eventID);
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

$app->post('/event/interest/count', function($request, $response) {
    $eventID = sanitize($request->getParsedBody()['eventID']); 
    
    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: eventInterestedCount | TOKEN: public'. " | EVENT ID: ".$eventID); }
    
    // The student is signed in
    //if (doesTokenExist($token)) {
        $result = getInterestedCount($eventID);
        if ($result != false) {
            if ($result->num_rows == 1) {
                $resultData = $result->fetch_assoc();
                $count = $resultData['interested'];
                return $response->withJson($count);
            } else {
                return $response->withJson("NORECORD", Error::NORECORD);
                exit;
            }
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }

});

$app->post('/event/interest/interested', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 
    $eventID = sanitize($request->getParsedBody()['eventID']); 

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: checkIfInterested | TOKEN: '.$token. " | EVENT ID: ".$eventID); }

    // The student is signed in
    if (doesTokenExist($token)) {
        $result = checkIfInterested($token, $eventID);
        if ($result != false) {
            if ($result->num_rows == 1) {
                return $response->withJson("true");
                exit;
            } else {
                return $response->withJson("false");
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

$app->post('/event/new', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $eventName = sanitize($request->getParsedBody()['eventName']);
    $eventDetails = sanitize($request->getParsedBody()['eventDetails']);
    $eventDate = sanitize($request->getParsedBody()['eventDate']);
    $eventDateAdded = sanitize($request->getParsedBody()['eventDateAdded']);
    $eventTime = sanitize($request->getParsedBody()['eventTime']);  
    $eventRank = sanitize($request->getParsedBody()['eventRank']);  
    $eventEntranceFee = sanitize($request->getParsedBody()['eventEntranceFee']); 
    $eventType = sanitize($request->getParsedBody()['eventType']); 
    $eventAccess = sanitize($request->getParsedBody()['eventAccess']); 
    $eventLocationText = sanitize($request->getParsedBody()['eventLocationText']);  
    $eventLocationX = sanitize($request->getParsedBody()['eventLocationX']);
    $eventLocationY = sanitize($request->getParsedBody()['eventLocationY']);
    $eventPicture = sanitize($request->getParsedBody()['eventPicture']);
    $eventPicturePostProcessing = sanitize($request->getParsedBody()['eventPicturePostProcessing']);  

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: eventNew | TOKEN: '.$token); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        $messageCheckResult = checkBadWords($eventDetails, getBadWords());
        if ($messageCheckResult['result']) {
            return $response->withJson("banNotify", Error::BANNOTIFY);
            exit;
        } 
        $messageCheckResultName = checkBadWords($eventName, getBadWords());
        if ($messageCheckResultName['result']) {
            return $response->withJson("banNotify", Error::BANNOTIFY);
            exit;
        } 
        $messageCheckResultLocation = checkBadWords($eventLocationText, getBadWords());
        if ($messageCheckResultLocation['result']) {
            return $response->withJson("banNotify", Error::BANNOTIFY);
            exit;
        } 


        $resultArray = eventNew( $eventName, $eventDetails, $eventDate, $eventDateAdded, $eventTime, $eventRank, $eventEntranceFee, $eventType, $eventAccess, $eventLocationText, $eventLocationX, $eventLocationY, $eventPicture, $eventPicturePostProcessing);
        $result = $resultArray['result'];
        //return $response->withJson($result);
        if ($result != false) {

            $returnData = array("state" => "success","eventID" => $resultArray['eventID']);
                
            $registrationIDs = getRegistrationIDsBasedOnRank($eventRank);
            $fcmMessage = "A new " . ucfirst($eventType) . " event has been added @ " . $eventLocationText;
            $FCM = sendAnnouncementNotifications($fcmMessage, $eventName, $registrationIDs );
            
            return $response->withJson($returnData);
 
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    

});

$app->post('/event/new/image', function($request, $response) {

    $token = sanitize($request->getParsedBody()['token']);
    $eventID = sanitize($request->getParsedBody()['eventID']);

    /// Log POST to file
    //if (LOG) { logPostToFile('dump',var_dump($_FILES)); }

    $imageGUID = createGUID() . ".jpg";

    $filePath = "./images/" . $imageGUID;

    if (doesTokenExist($token)) { 
         if (move_uploaded_file($_FILES['photo']['tmp_name'],$filePath)) {
             $result = updateEventID($eventID,$imageGUID);
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



$app->post('/event/comment/all', function($request, $response) {
    //$token = sanitize($request->getParsedBody()['token']); 
    $eventID = sanitize($request->getParsedBody()['eventID']); 

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: getAllComments | TOKEN: '.$token. " | EVENT ID: ".$eventID); }

    // The student is signed in
    //if (doesTokenExist($token)) {
        $result = getAllComments($eventID);
        if ($result != false) {
            if ($result->num_rows != 0) {
                $events = array();
                while ($rawData = mysqli_fetch_assoc($result)) {
                    $perCommentCount = getPerCommentCount($rawData['comment_id']);
                    $perCommentCountData = $perCommentCount->fetch_assoc();
                    $rawData['niced_anmount'] = $perCommentCountData['count'];

                    //$isNice = studentIsNiced($rawData['comment_id'], getStudentID($token));
                    //$isNiceData = $isNice->fetch_assoc();
                    //$rawData['niced'] = $isNiceData['is_nice'];

                    $studentName = getStudentNameSurname($rawData['student_id']);
                    $studentNameData = $studentName->fetch_assoc();
                    $rawData['name'] = $studentNameData['name'];

                    array_push($events, $rawData);
                }
                return $response->withJson($events);
                //sendResponse("0", "events", json_encode($events));
            } else {
                return $response->withJson("NORECORD", Error::NORECORD);
                exit;
            }
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    //} else {
    //    return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
    //    exit;
    //}


});

$app->post('/event/comment/all/token', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 
    $eventID = sanitize($request->getParsedBody()['eventID']); 

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: getAllCommentsToken | TOKEN: '.$token. " | EVENT ID: ".$eventID); }

    // The student is signed in
    if (doesTokenExist($token)) {
        $result = getAllComments($eventID);
        if ($result != false) {
            if ($result->num_rows != 0) {
                $events = array();
                while ($rawData = mysqli_fetch_assoc($result)) {
                    $perCommentCount = getPerCommentCount($rawData['comment_id']);
                    $perCommentCountData = $perCommentCount->fetch_assoc();
                    $rawData['niced_anmount'] = $perCommentCountData['count'];

                    $isNice = studentIsNiced($rawData['comment_id'], $token);
                    $isNiceData = $isNice->fetch_assoc();
                    $rawData['niced'] = $isNiceData['is_nice'];

                    $studentName = getStudentNameSurname($rawData['student_id']);
                    $studentNameData = $studentName->fetch_assoc();
                    $rawData['name'] = $studentNameData['name'];

                    array_push($events, $rawData);
                }
                return $response->withJson($events);
                //sendResponse("0", "events", json_encode($events));
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

$app->post('/event/comment/nicedCount', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 
    $commentID = sanitize($request->getParsedBody()['commentID']); 

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: getNicedCount | TOKEN: '.$token. " | COMMENT ID: ".$commentID ); }


    // The student is signed in
    if (doesTokenExist($token)) {
        $result = getPerCommentCount($commentID);
        if ($result != false) {
            if ($result->num_rows == 1) {
                $resultData = $result->fetch_assoc();
                $count = $resultData['count'];
                return $response->withJson($count);
            }
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::UNAUTHORIZED);
        exit;
    }


});

$app->post('/event/comment/nice/insert', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 
    $commentID = sanitize($request->getParsedBody()['commentID']); 

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: commentNicedInsert | TOKEN: '.$token. " | COMMENT ID: ".$commentID); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        // $noRows = combo()
        // if () {

        // }
        $result = commentNicedInsert($token, $commentID);
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

$app->post('/event/comment/nice/delete', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 
    $commentID = sanitize($request->getParsedBody()['commentID']); 

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: commentNicedDelete | TOKEN: '.$token. " | COMMENT ID: ".$commentID); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        $result = commentNicedDelete($token, $commentID);
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

$app->post('/event/comment/new', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $eventID = sanitize($request->getParsedBody()['eventID']);
    $studentID = sanitize($request->getParsedBody()['studentID']);
    $date = sanitize($request->getParsedBody()['date']);
    $time = sanitize($request->getParsedBody()['time']);
    $content = sanitize($request->getParsedBody()['content']);  

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: commentInsert | TOKEN: '.$token); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        $result = commentNew( $eventID, $studentID, $date, $time, $content);
        if ($result != false) {

            $messageCheckResult = checkBadWords($content, getBadWords());
            if ($messageCheckResult['result']) {
                banComment();
                banStudentOnMessage($studentID, $messageCheckResult['word']);
                
                $registrationIDs = getRegistrationIDsBasedOnRank("8");
                $fcmMessage = "Bad word found in Comment. Student banned: ".getJustNameAndSurnameFromStudentID($studentID);
                $FCM = sendAnnouncementNotifications($fcmMessage, "Ban System", $registrationIDs );

                return $response->withJson("ban", Error::BANSTUDENT);
            } else { 
                return $response->withJson("success");
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

$app->post('/event/comment/report', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $commentID = sanitize($request->getParsedBody()['commentID']);

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: commentInsert | TOKEN: '.$token. " | COMMENT ID: ".$commentID); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        $result = reportComment( $commentID);
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

$app->post('/event/calendar/private', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);


    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: commentInsert | TOKEN: '.$token. " | COMMENT ID: ".$commentID); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        $result = getCalendarDates($token);
        if ($result != false) {
            if ($result->num_rows != 0) {
                $events = array();
                while ($rawData = mysqli_fetch_assoc($result)) {
                    array_push($events, $rawData);
                }
                return $response->withJson($events);
                //sendResponse("0", "events", json_encode($events));
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

$app->post('/event/calendar/open', function($request, $response) {

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: calendarOpen'); }
       

    // The guest is requesting
    $result = getOpenCalendarDates();
    if ($result != false) {
        if ($result->num_rows != 0) {
            $events = array();
            while ($rawData = mysqli_fetch_assoc($result)) {
                array_push($events, $rawData);
            }
            return $response->withJson($events);
            //sendResponse("0", "events", json_encode($events));
        } else {
            return $response->withJson("NORECORD", Error::NORECORD);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::FALSEDATA);
        exit;
    }

});

$app->post('/event/calendar/insert', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);
    $title = sanitize($request->getParsedBody()['title']);
    $description = sanitize($request->getParsedBody()['description']);
    $location = sanitize($request->getParsedBody()['location']);
    $date = sanitize($request->getParsedBody()['date']);
    $rank = sanitize($request->getParsedBody()['rank']);

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: calendarNew'); }


    // The student is signed in
    if (doesTokenExist($token)) {

        $messageCheckResult = checkBadWords($title, getBadWords());
        if ($messageCheckResult['result']) {
            return $response->withJson("banNotify", Error::BANNOTIFY);
            exit;
        } 

        $messageCheckResult = checkBadWords($description, getBadWords());
        if ($messageCheckResult['result']) {
            return $response->withJson("banNotify", Error::BANNOTIFY);
            exit;
        } 

        $messageCheckResult = checkBadWords($location, getBadWords());
        if ($messageCheckResult['result']) {
            return $response->withJson("banNotify", Error::BANNOTIFY);
            exit;
        } 

        $result = insertCalendarDates($studentID, $title, $description, $location, $date, $rank);
        if ($result != false) {

            //$registrationIDs = getRegistrationIDsBasedOnRank($rank);
            $registrationIDs = array('d7rdP9zN6Bo:APA91bHnI2LCKI3GRqkhIBM-CT_Lxx5ZleDbL_v5wUauMwKJqu5gvcBV3kX1GsvFn2xMfRZP2umhrzqqs72X_e30r09Wf_qarSTdnwMD-psneiXtInfw5B94jEbz3fm2vhJmy5OAHnDt');
            $fcmMessage = "A new calendar date has been added. ";
            $FCM = sendAnnouncementNotifications($fcmMessage, $title, $registrationIDs );

            return $response->withJson("success");
            exit;
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }    

});