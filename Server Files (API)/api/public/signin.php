<?php


$app->post('/student/signin', function($request, $response) {
    $studentID = sanitize($request->getParsedBody()['studentID']);
    $googleID = sanitize($request->getParsedBody()['googleID']);

    // Set the API Token
    $token = getToken();
    
    // Log signin to file
    if (LOG) { logPostToFile('signin',$studentID . " " . $googleID) ; }

    // Get result from SQL
    $result = studentSignIn($studentID);

    if ($result != false) {
        if ($result->num_rows == 1) { 

            // Get the asoc of the SQL Statement
            $resultData = $result->fetch_assoc();
            
            if ($resultData['active'] == '-1') { 
                
                // Add the token to the ResultData array
                $resultData['token'] = $token;

                if (updateTokenAndGoogleID($studentID, $token, $googleID)) {
                    // Send the response if the Token and google_id have successfully been updated
                    return $response->withJson($resultData);
                    //sendResponse("0", "Successful sign in", "[".json_encode($resultData)."]");
                    exit;
                } else {
                    return $response->withJson( array("student_id" => '0'), Error::AUTHUPDATEFAILED);
                    exit;
                }
            } else {  
                return $response->withJson( array("student_id" => '0'), Error::NOTACTIVE);
                exit;
            }
        } else {
            return $response->withJson( array("student_id" => '0'), Error::NOUSER);
            exit;
        }
    } else {
        return $response->withJson( array("student_id" => '0'), Error::FALSEDATA);
        exit;
    }
    
});

$app->post('/student/signout', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    
    
    // Log signin to file
    if (LOG) { logPostToFile('signout'," Token: " . $token) ; }
    
    if (doesTokenExist($token)) {
        // Get result from SQL
        $result = studentSignOut($token);

        if ($result != false) { 
            //sendResponse("0", "Successful sign Out", "");
            return $response->withJson(array('active' => 'success'));
            exit;
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::UNAUTHORIZED);
        exit;
    }


}); 


$app->post('/student/new', function($request, $response) {
    $studentNumber = sanitize($request->getParsedBody()['studentNumber']);
    $firstName = sanitize($request->getParsedBody()['firstName']);
    $lastName = sanitize($request->getParsedBody()['lastName']);
    $googleID = sanitize($request->getParsedBody()['googleID']);    
    $qrCode = sanitize($request->getParsedBody()['qrCode']);
    
    // Log signin to file
    if (LOG) { logPostToFile('signin',$studentID . " " . $googleID) ; }

    $messageCheckResult = checkBadWords($firstName, getBadWords());
    if ($messageCheckResult['result']) {
        return $response->withJson("banNotify", Error::BANNOTIFY);
        exit;
    } 

    $messageCheckResultSurname = checkBadWords($lastName, getBadWords());
    if ($messageCheckResultSurname['result']) {
        return $response->withJson("banNotify", Error::BANNOTIFY);
        exit;
    } 
    
    // Check if student already Exist
    if (newStudent($studentNumber) && ( $qrCode == 'YONYXNKW9IEUPISMVO0J' || $qrCode == 'JU9A3OXUVFLWJC4B5M3T' || $qrCode == 'KF3YER7OP4QBYGPH76CL' || $qrCode == 'GTJ15T6F5YOP7O9ZNIFO' || $qrCode == 'GCFRYTBLNX0X7C7Q2W5G' || $qrCode == 'NB5L6OUPK5KBYXYCIUJJ' )) {
        
        // Get result from SQL
        $result;
        if ($qrCode == 'YONYXNKW9IEUPISMVO0J') {
            // President QR
            $result = insertStudent($studentNumber, $firstName, $lastName, $googleID,  'SRC_PRESIDENT', '10');
        } else if ($qrCode == 'NB5L6OUPK5KBYXYCIUJJ') {
            // SRC VICE PRESIDENT
            $result = insertStudent($studentNumber, $firstName, $lastName, $googleID, 'SRC_VICE_PRESIDENT', '9');
        } else if ($qrCode == 'JU9A3OXUVFLWJC4B5M3T') {
            // SRC BOARD MEMBER
            $result = insertStudent($studentNumber, $firstName, $lastName, $googleID, 'SRC_BOARD_MEMBER', '8');
        } else if ($qrCode == 'KF3YER7OP4QBYGPH76CL') {
            // SRC MEMBER
            $result = insertStudent($studentNumber, $firstName, $lastName, $googleID, 'SRC_MEMBER', '7');
        } else if ($qrCode == 'GTJ15T6F5YOP7O9ZNIFO') {
            // STUDENT
            $result = insertStudent($studentNumber, $firstName, $lastName, $googleID, 'STUDENT', '4');
        } else if ($qrCode == 'GCFRYTBLNX0X7C7Q2W5G') {
            // RANDOM 
        }
        

        if ($result != false) {
            return $response->withJson("success");
        } else {
            return $response->withJson("FALSEDATA", Error::FALSEDATA);
            exit;
        }
    } else {
        return $response->withJson("FALSEDATA", Error::ALREADYUSER);
        exit;
    }

    
    
});
