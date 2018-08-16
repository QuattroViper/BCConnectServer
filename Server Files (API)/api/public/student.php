<?php

$app->post('/student/account/upgrade', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);
    $qrCode = sanitize($request->getParsedBody()['QRCode']);

    if (doesTokenExist($token)) { 

        // Get result from SQL
        $result;
        if ($qrCode == 'YONYXNKW9IEUPISMVO0J') {
            // President QR
            $result = upgradeAccount($studentID, 'SRC_PRESIDENT', '10');
        } else if ($qrCode == 'NB5L6OUPK5KBYXYCIUJJ') {
            // SRC VICE PRESIDENT
            $result = upgradeAccount($studentID, 'SRC_VICE_PRESIDENT', '9');
        } else if ($qrCode == 'JU9A3OXUVFLWJC4B5M3T') {
            // SRC BOARD MEMBER
            $result = upgradeAccount($studentID, 'SRC_BOARD_MEMBER', '8');
        } else if ($qrCode == 'KF3YER7OP4QBYGPH76CL') {
            // SRC MEMBER
            $result = upgradeAccount($studentID, 'SRC_MEMBER', '7');
        } else if ($qrCode == 'GTJ15T6F5YOP7O9ZNIFO') {
            // STUDENT
            $result = upgradeAccount($studentID, 'STUDENT', '4');
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
        return $response->withJson("UNAUTHORIZED", Error::UNAUTHORIZED);
        exit;
    }

});

$app->post('/student/account/delete', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);

    if (doesTokenExist($token)) { 
        $result = deleteAccount($studentID);
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


$app->post('/student/account/update', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);
    $studentID = sanitize($request->getParsedBody()['studentID']);
    $name = sanitize($request->getParsedBody()['name']);
    $surname = sanitize($request->getParsedBody()['surname']);

    if (doesTokenExist($token)) { 

        $messageCheckResult = checkBadWords($name, getBadWords());
        if ($messageCheckResult['result']) {
            return $response->withJson("banNotify", Error::BANNOTIFY);
            exit;
        } 
        $messageCheckResultSurname = checkBadWords($surname, getBadWords());
        if ($messageCheckResultSurname['result']) {
            return $response->withJson("banNotify", Error::BANNOTIFY);
            exit;
        } 

        $previousName = getJustNameAndSurnameFromStudentID($studentID);

        $result = updateAccount($studentID, $name, $surname);
        if ($result != false) {
            insertToStudentChanges($studentID,$previousName, $name, $surname);
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

$app->post('/student/houses/all', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);

    if (doesTokenExist($token)) { 
        $result = getHouses();
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

$app->post('/student/club/all', function($request, $response) {
    $token = sanitize($request->getParsedBody()['token']);

    if (doesTokenExist($token)) { 
        $result = getClubs();
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
