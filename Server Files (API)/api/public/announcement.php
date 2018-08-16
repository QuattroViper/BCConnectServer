<?php


$app->post('/announcement/new', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']); 
    $studentID = sanitize($request->getParsedBody()['studentID']);
    $name = sanitize($request->getParsedBody()['name']);
    $date = sanitize($request->getParsedBody()['date']);
    $dateAdded = sanitize($request->getParsedBody()['dateAdded']);
    $message = sanitize($request->getParsedBody()['message']);  
    $thumbnailMessage = sanitize($request->getParsedBody()['thumbnailMessage']);    
    $minRank = sanitize($request->getParsedBody()['minRank']);  

    // Log POST to file
    if (LOG) { logPostToFile('log','POSTTYPE: announcementNew | TOKEN: '.$token); }
    
    // The student is signed in
    if (doesTokenExist($token)) {
        $result = announcementNew($studentID, $name, $date, $dateAdded, $message, $thumbnailMessage, $minRank);
        if ($result != false) {

            $messageCheckResult = checkBadWords($message, getBadWords());
            if ($messageCheckResult['result']) {
                banAnnouncement();
                banStudentOnMessage($studentID, $messageCheckResult['word']);
                
                $registrationIDs = getRegistrationIDsBasedOnRank("8");
                $fcmMessage = "Bad word found. Board member banned: ".getJustNameAndSurnameFromStudentID($studentID);
                $FCM = sendAnnouncementNotifications($fcmMessage, "Ban System", $registrationIDs );

                return $response->withJson("ban", Error::BANSTUDENT);
            } else {
                $registrationIDs = getRegistrationIDsBasedOnRank($minRank);
                $fcmMessage = getNameAndSurnameFromStudentID($studentID);
                $FCM = sendAnnouncementNotifications($fcmMessage, $name, $registrationIDs );
    
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

$app->post('/announcement/all', function($request, $response) {
    $rank = sanitize($request->getParsedBody()['rank']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: announcementAll | RANK: '.$rank); }

    
    $result = getAllannouncements($rank);
    if ($result != false) {
        if ($result->num_rows != 0) {
            $announcement = array();
            while ($rawData = mysqli_fetch_assoc($result)) {
  
                $perAnnouncementCount = getViewedPerAnnouncement($rawData['announcement_id']);
                $perAnnouncementCountData = $perAnnouncementCount->fetch_assoc();
                $rawData['viewed_amount'] = $perAnnouncementCountData['count'];

                array_push($announcement, $rawData);

            }
            //sendResponse("0", "events", json_encode($events));
            return $response->withJson($announcement);
        } else {
            return $response->withJson("NORECORD", Error::NORECORD);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::FALSEDATA);
        exit;
    }

});

$app->post('/announcement/viewed', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $announcementID = sanitize($request->getParsedBody()['announcementID']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: announcementViewed | TOKEN: '.$token); }

    
    $result = updateAnnouncementViewed($token, $announcementID);
    if ($result != false) {
        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::FALSEDATA);
        exit;
    } 
    

});

$app->post('/announcement/deactivate', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $announcementID = sanitize($request->getParsedBody()['announcementID']);

    // Log the POST request to file. Change LOG to false to stop Logging in CONFIGURATIONS.php
    if (LOG) { logPostToFile('log','POSTTYPE: announcementDelete | TOKEN: '.$token); }

    // The student is signed in
    if (doesTokenExist($token)) {
        $result = deleteAnnouncement($announcementID);
        if ($result != false) {
            if ($result != false) {
                return $response->withJson("success");
            } else {
                return $response->withJson("FALSEDATA", Error::FALSEDATA);
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