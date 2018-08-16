<?php


$app->post('/communicate/new', function($request, $response) { 
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']); 
    $category = sanitize($request->getParsedBody()['category']); 
    $date = sanitize($request->getParsedBody()['date']); 
    $message = sanitize($request->getParsedBody()['message']); 
    $phoneNumber = sanitize($request->getParsedBody()['phoneNumber']); 

    if (doesTokenExist($token)) {
        $result = insertCommunicate($studentID, $category, $date, $message, $phoneNumber );
        if ($result != false) {

            $messageCheckResult = checkBadWords($message, getBadWords());
            if ($messageCheckResult['result']) {
                banStudentOnMessage($studentID, $messageCheckResult['word']);
                
                $registrationIDs = getRegistrationIDsBasedOnRank("8");
                $fcmMessage = "Bad word found. Student banned: ".getJustNameAndSurnameFromStudentID($studentID);
                $FCM = sendAnnouncementNotifications($fcmMessage, "Ban System", $registrationIDs );

                return $response->withJson("ban", Error::BANSTUDENT);
            } else {
                $registrationIDs = getRegistrationIDsBasedOnRank("8");
                $fcmMessage;
                if (strtolower($category) == 'complaint') {
                    $fcmMessage = "A new complaint has been made by " . getNameAndSurnameFromStudentID($studentID);
                } else if (strtolower($category) == 'comment') {
                    $fcmMessage = "A new comment has been made by " . getNameAndSurnameFromStudentID($studentID);
                } else if (strtolower($category) == 'question') {
                    $fcmMessage = "A new question has been asked by " . getNameAndSurnameFromStudentID($studentID);
                }
                
                $FCM = sendAnnouncementNotifications($fcmMessage, $eventName, $registrationIDs );
    
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