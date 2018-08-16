<?php



function template() {
    global $connection;
    
    return $connection->query(" ");
}

function studentSignIn($studentID) {
    global $connection;
    
    return $connection->query("SELECT * FROM tblStudent WHERE identification_number = '{$studentID}' LIMIT 1 ");
}

function updateTokenAndGoogleID($studentID, $token, $googleID) {
    global $connection;
    
    return $connection->query("UPDATE tblStudent SET google_services_id  = '{$googleID}', session_token = '{$token}' WHERE identification_number = '{$studentID}' ");
}

function studentSignOut($token) {
    global $connection;
    
    return $connection->query("UPDATE tblStudent SET session_token = '' WHERE session_token = '{$token}' ");
}

function doesTokenExist($token) {
    global $connection;

    $result = $connection->query("SELECT session_token FROM tblStudent WHERE session_token = '{$token}' LIMIT 1; ");

    if ($result != false) {
        if ($result->num_rows == 1) {  
            return true;
        } 
    } 
    return false;
}

function getAllEvents($token) {
    // For students only
    // Only give events to students that have the correct rank
    global $connection;
    
    return $connection->query(" SELECT E.event_id, E.name, E.date, E.date_added, E.cost, E.time, E.type, E.erank, E.access, E.more_details, E.place, E.picture, E.postprocessing, "
    ."(SELECT COUNT(*) FROM tblStudentEvent SE WHERE SE.event_id = E.event_id) AS 'interested' "
    ."FROM tblEvent E WHERE CAST(E.erank AS SIGNED) <= CAST((SELECT rank FROM tblStudent WHERE session_token = '{$token}') AS SIGNED)  AND ( YEAR(E.date) >= YEAR(CURDATE()) )  ORDER BY (STR_TO_DATE(E.date, '%Y-%m-%d')) ; ");
}

function getAllOpenEvents($token) {
    // For students only
    // Only give events to students that have the correct rank
    global $connection;
    
    return $connection->query(" SELECT E.event_id, E.name, E.date, E.date_added, E.cost, E.time, E.type, E.erank, E.access, E.more_details, E.place, E.picture, E.postprocessing, "
        ."(SELECT COUNT(*) FROM tblStudentEvent SE WHERE SE.event_id = E.event_id) AS 'interested' "
        ." FROM tblEvent E WHERE CAST(E.erank AS SIGNED) <= CAST((SELECT rank FROM tblStudent WHERE session_token = '{$token}') AS SIGNED) AND (CURDATE() <  (STR_TO_DATE(date, '%Y-%m-%d')  + INTERVAL 1 DAY))  ORDER BY (STR_TO_DATE(E.date, '%Y-%m-%d')) ; ");
}

function getPublicEvents() {
    // Only for public / Guests
    // -- CHANGE --
    // Only give events that are public and rank = RANK_STUDENT
    global $connection;
    
    return $connection->query(" SELECT E.event_id, E.name, E.date, E.date_added, E.cost, E.time, E.type, E.erank, E.access, E.more_details, E.place, E.picture, E.postprocessing, "
        ."(SELECT COUNT(*) FROM tblStudentEvent SE WHERE SE.event_id = E.event_id) AS 'interested' " 
        ." FROM tblEvent E WHERE erank <= 0 AND access='public' AND ( YEAR(E.date) >= YEAR(CURDATE()) )  ORDER BY (STR_TO_DATE(E.date, '%Y-%m-%d')) ; ");
}

function getOpenPublicEvents() {
    // Only for public / Guests
    // -- CHANGE --
    // Only give events that are public and rank = RANK_STUDENT
    global $connection;
    
    return $connection->query(" SELECT E.event_id, E.name, E.date, E.date_added, E.cost, E.time, E.type, E.erank, E.access, E.more_details, E.place, E.picture, E.postprocessing, "
        ."(SELECT COUNT(*) FROM tblStudentEvent SE WHERE SE.event_id = E.event_id) AS 'interested' "       
        ." FROM tblEvent E WHERE erank <= 0 AND access='public' AND (CURDATE() < STR_TO_DATE(date, '%Y-%m-%d'))  ORDER BY (STR_TO_DATE(E.date, '%Y-%m-%d')) ; ");
}

function getSettings() {
    global $connection;
    
    return $connection->query(" SELECT * FROM tblAppSettings");
}

function updateEventInterest($token, $eventID) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblStudentEvent(student_id, event_id) SELECT student_id, '{$eventID}' FROM tblStudent WHERE session_token = '{$token}'; ");
}

function getInterestedCount($eventID) {
    global $connection;
    
    return $connection->query(" SELECT COUNT(*) AS 'interested' FROM tblStudentEvent WHERE event_id = '{$eventID}'; ");
}

function deleteInterested($token, $eventID) {
    global $connection;
    
    return $connection->query(" DELETE FROM tblStudentEvent WHERE student_id = (SELECT student_id FROM tblStudent WHERE session_token = '{$token}' ) AND event_id = '{$eventID}' ");
}

function checkIfInterested($token, $eventID) {
    global $connection;
    
    return $connection->query(" SELECT * FROM tblStudentEvent WHERE student_id = (SELECT student_id FROM tblStudent WHERE session_token = '{$token}' ) AND event_id = '{$eventID}' ");
}

function getAllComments($eventID) {
    global $connection;
    
    return $connection->query(" SELECT C.comment_id, C.event_id, C.student_id, C.date, C.time, C.content FROM tblComment C WHERE C.event_id = '{$eventID}' AND C.active ='-1' AND C.deleted = '0' ; ");
}

function getPerCommentCount($commentID) {
    global $connection;
    
    return $connection->query(" SELECT COUNT(*)  AS count FROM tblStudentComment SC WHERE SC.comment_id = '{$commentID}' ; ");
}

function studentIsNiced($commentID, $token) {
    global $connection;
    
    return $connection->query(" SELECT COUNT(*)  AS is_nice FROM tblStudentComment SC WHERE SC.comment_id = '{$commentID}' AND SC.student_id = (SELECT S.student_id FROM tblStudent S WHERE S.session_token = '{$token}') ; ");
}

function commentNicedInsert($token, $commentID) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblStudentComment(student_id,comment_id) SELECT student_id, '{$commentID}' FROM tblStudent WHERE session_token = '{$token}' ; ");
}

function commentNicedDelete($token, $commentID) {
    global $connection;
    
    return $connection->query(" DELETE  FROM tblStudentComment WHERE student_id = (SELECT S.student_id FROM tblStudent S WHERE S.session_token = '{$token}') AND comment_id = '{$commentID}' ; ");
}

function commentNew($eventID, $studentID, $date, $time, $content) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblComment( `event_id`, `student_id`, `date`, `time`, `content`, `active`, `deleted`) VALUES ('{$eventID}','{$studentID}','{$date}','{$time}','{$content}','-1','0') ; ");
}

function reportComment( $commentID) {
    global $connection;
    
    return $connection->query(" UPDATE tblComment SET active='0' WHERE comment_id = '{$commentID}' ");
}


function getStudentNameSurname($studentID) {
    global $connection;
    
    return $connection->query(" SELECT CONCAT(S.first_name, ' ' ,S.last_name)  AS name FROM tblStudent S WHERE S.student_id = '{$studentID}' ; ");
}

function getStudentID($token) {
    global $connection;
    
    $result = $connection->query(" SELECT S.student_id FROM tblStudent S WHERE S.session_token = '{$token}' ; ");

    if ($result != false) {
        if ($result->num_rows == 1) {
            $resultData = $result->fetch_assoc();
            return $resultData['student_id'];
        } else { return false ;}
    }
}

function newStudent($studentNumber) {
    global $connection;

    $result = $connection->query(" SELECT * FROM tblStudent S WHERE S.identification_number = '{$studentNumber}' ; ");

    if ($result != false) {
        if ($result->num_rows == 0) {
            return true;
        } else { 
            return false;
        }
    } else {
        return false;
    }
    
    return false;
}

function insertStudent($studentNumber, $firstName, $lastName, $googleID, $department, $rank) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblStudent( `identification_number`, `first_name`, `last_name`, `google_services_id`, `department`, `rank`, `session_id`, `browser_password`, `active`, `session_token`) VALUES ('{$studentNumber}','{$firstName}','{$lastName}','{$googleID}','{$department}','{$rank}','','','-1','') ; ");
}

function announcementNew($studentID, $name, $date, $dateAdded, $message, $thumbnailMessage, $minRank) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblAnnouncement(`student_id`, `name`, `date`, `date_added`, `message`, `thumbnail_message`, `min_rank`, `active`) VALUES ('{$studentID}','{$name}','{$date}','{$dateAdded}','{$message}','{$thumbnailMessage}','{$minRank}','-1') ; ");
}

function getAllannouncements($rank) {
    global $connection;
    
    return $connection->query(" SELECT * FROM tblAnnouncement A WHERE A.active = '-1' AND CAST(A.min_rank AS SIGNED) <= CAST('{$rank}' AS SIGNED) AND (CURDATE() <= (STR_TO_DATE(A.date, '%Y-%m-%d')))  ORDER BY (STR_TO_DATE(A.date, '%Y-%m-%d')) ; ");
}

function updateAnnouncementViewed($token, $announcementID) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblStudentAnnouncement(`student_id`, `announcement_id`) SELECT student_id, '{$announcementID}' FROM tblStudent WHERE session_token = '{$token}' AND NOT EXISTS( SELECT * FROM tblStudentAnnouncement SA WHERE SA.student_id = (SELECT student_id FROM tblStudent WHERE session_token = '{$token}') AND SA.announcement_id = '{$announcementID}') ; ");
}

function getViewedPerAnnouncement($announcementID) {
    global $connection;
    
    return $connection->query(" SELECT COUNT(*) AS count FROM tblStudentAnnouncement SA WHERE SA.announcement_id = '{$announcementID}' ; ");
}

function deleteAnnouncement($announcementID) {
    global $connection;
    
    return $connection->query(" UPDATE tblAnnouncement SET active = '0' WHERE announcement_id = '{$announcementID}' ; ");
}

function getAdminStats() {
    global $connection;
    
    return $connection->query(" SELECT ( SELECT COUNT(*) FROM tblStudent S WHERE S.active = '0' ) AS 'banned', ( SELECT COUNT(*) FROM tblStudent S WHERE S.active = '-1' ) AS 'active', ( SELECT COUNT(*) FROM tblComment C WHERE C.active = '0' ) AS 'reported', ( SELECT COUNT(*) FROM tblCommunicate C WHERE C.resolved = '-1') AS 'communications' ; ");
}

function getBannedStudents() {
    global $connection;
    
    return $connection->query(" SELECT S.student_id, S.first_name,S.last_name, SB.reason, S.identification_number, S.rank FROM tblStudent S INNER JOIN tblStudentBanned SB ON S.student_id = SB.student_id ; ");
}

function getActiveStudents() {
    global $connection;
    
    return $connection->query(" SELECT S.student_id, S.first_name, S.last_name, S.identification_number, S.rank FROM tblStudent S WHERE S.active = '-1' ; ");
}

function getReportedComments() {
    global $connection;
    
    return $connection->query(" SELECT C.*, S.student_id, S.first_name, S.last_name FROM tblComment C INNER JOIN tblStudent S ON C.student_id = S.student_id WHERE C.active = '0' AND C.deleted = '0' ; ");
}

function getCommunications() {
    global $connection;
    
    return $connection->query(" SELECT C.communicate_id, C.message, C.category, S.student_id, S.first_name, S.last_name, C.phone_number FROM tblCommunicate C INNER JOIN tblStudent S ON C.student_id = S.student_id WHERE C.resolved = '0' ; ");
}


function unbanStudent($studentID) {
    global $connection;
    
    $connection->query(" UPDATE tblStudent SET active = '-1' WHERE student_id = '{$studentID}' ; ");

    return $connection->query(" DELETE FROM tblStudentBanned WHERE student_id = '{$studentID}' ; ");
}

function banStudent($studentID) {
    global $connection;
    
    $connection->query(" UPDATE tblStudent SET active = '0', session_token = '' WHERE student_id = '{$studentID}' ; ");

    return $connection->query(" INSERT INTO tblStudentBanned(`student_id`,`reason`) VALUES ('{$studentID}','Manually banned on app') ; ");
}

function deleteComment($commentID) {
    global $connection;

    return $connection->query(" UPDATE tblComment SET deleted = '-1' , active = '0' WHERE comment_id = '{$commentID}'; ");
}


function resolveComment($commentID) {
    global $connection;

    return $connection->query(" UPDATE tblComment SET active = '-1' WHERE comment_id = '{$commentID}'; ");
}


function resolveCommunication($communicationsID) {
    global $connection;

    return $connection->query(" UPDATE tblCommunicate SET resolved = '-1' WHERE communicate_id = '{$communicationsID}'; ");
}


function getRegistrationIDsBasedOnRank($rank) {
    global $connection;
    
    $registrationIDs = array();

    $result = $connection->query(" SELECT S.google_services_id FROM tblStudent S WHERE ( CAST(S.rank AS SIGNED) >= CAST(('{$rank}') AS SIGNED) ) AND S.session_token != '' AND S.google_services_id != '' ; ");

    if ($result != false) {
        if ($result->num_rows != 0) { 
            while ($rawData = mysqli_fetch_assoc($result)) {
                array_push($registrationIDs, $rawData['google_services_id']);
            }
        }
    }

    return $registrationIDs;
}


function getNameAndSurnameFromStudentID($studentID) {
    global $connection;

    $result = $connection->query(" SELECT CONCAT( S.first_name, ' ', S.last_name) AS 'full_name', S.rank FROM tblStudent S WHERE S.student_id = '{$studentID}' ; ");

    if ($result != false) {
        $resultData = $result->fetch_assoc();

        $message = '';

        if ($resultData['rank'] == 10) {
            $message = 'New Announcement by '. $resultData['full_name'] . ', SRC President';
        } else if ($resultData['rank'] == 9) {
            $message = 'New Announcement by '. $resultData['full_name'] . ', SRC Vice President';
        } else if ($resultData['rank'] == 8) {
            $message = 'New Announcement by '. $resultData['full_name'] . ', SRC Board Member';
        } else if ($resultData['rank'] == 7) {
            $message = 'New Announcement by '. $resultData['full_name'] . ', SRC';
        } else if ($resultData['rank'] == 4) {
            $message = $resultData['full_name'];
        }

        return $message;
    }

    return '';
}

function getJustNameAndSurnameFromStudentID($studentID) {
    global $connection;

    $result = $connection->query(" SELECT CONCAT( S.first_name, ' ', S.last_name) AS 'full_name', S.rank FROM tblStudent S WHERE S.student_id = '{$studentID}' ; ");

    if ($result != false) {
        $resultData = $result->fetch_assoc();
        return $resultData['full_name'];
    }

    return '';
}


function insertCommunicate($studentID, $category, $date, $message, $phoneNumber ) {
    global $connection;

    return $connection->query(" INSERT INTO tblCommunicate(`student_id`, `category`, `message`, `resolved`, `phone_number`, `date`) VALUES ('{$studentID}','{$category}','{$message}','0','{$phoneNumber}','{$date}') ; ");
}


function eventNew( $eventName, $eventDetails, $eventDate, $eventDateAdded, $eventTime, $eventRank, $eventEntranceFee, $eventType, $eventAccess, $eventLocationText, $eventLocationX, $eventLocationY, $eventPicture, $eventPicturePostProcessing) {
    global $connection;

    // $result = $connection->query(" START TRANSACTION;
    // INSERT INTO tblEvent(`name`, `date`, `date_added`, `cost`, `time`, `type`, `erank`, `access`, `more_details`, `place`, `interested`, `picture`, `postprocessing`) VALUES ('{$eventName}','{$eventDate}','{$eventDateAdded}','{$eventEntranceFee}','{$eventTime}','{$eventType}','{$eventRank}','{$eventAccess}','{$eventDetails}','{$eventLocationText}','0','{$eventPicture}','{$eventPicturePostProcessing}');
    // INSERT INTO tblMapPosition(`event_id`, `langtitude`, `latitude`) VALUES (LAST_INSERT_ID(),'{$eventLocationX}','{$eventLocationY}');
    // COMMIT; ");

    $result = $connection->query(" INSERT INTO tblEvent(`name`, `date`, `date_added`, `cost`, `time`, `type`, `erank`, `access`, `more_details`, `place`, `interested`, `picture`, `postprocessing`) VALUES ('{$eventName}','{$eventDate}','{$eventDateAdded}','{$eventEntranceFee}','{$eventTime}','{$eventType}','{$eventRank}','{$eventAccess}','{$eventDetails}','{$eventLocationText}','0','{$eventPicture}','{$eventPicturePostProcessing}'); ");

    $eventIDResult = $connection->query(" SELECT E.event_id FROM tblEvent E ORDER BY E.event_id DESC LIMIT 1; ");

    $eventIDResultData = $eventIDResult->fetch_assoc();

    $eventID = $eventIDResultData['event_id'];

    $resultMap = $connection->query(" INSERT INTO tblMapPosition(`event_id`, `langtitude`, `latitude`) VALUES ('{$eventID}','{$eventLocationX}','{$eventLocationY}') ; ");

    return array("result" => $result, "eventID" => $eventID);
}

function updateEventID($eventID,$imageGUID) {
    global $connection;

    return $connection->query(" UPDATE `tblEvent` SET picture = '{$imageGUID}' WHERE event_id = '{$eventID}' ; ");
}

function getLatestAppVersion() {
    global $connection;

    return $connection->query(" SELECT V.version FROM tblVersion V LIMIT 1");
}

function banStudentOnMessage($studentID, $word) {
    global $connection;
    
    $connection->query(" UPDATE tblStudent SET active = '0', session_token = '' WHERE student_id = '{$studentID}' ; ");

    return $connection->query(" INSERT INTO tblStudentBanned(`student_id`,`reason`) VALUES ('{$studentID}','Bad word found in Message. Word: {$word}') ; ");
}

function getBadWords() {
    global $connection;
    
    return $connection->query(" SELECT BW.word FROM tblBadWords BW ; ");
}


function banAnnouncement() {
    global $connection;
    
    return $connection->query(" UPDATE tblAnnouncement SET active = '0' WHERE announcement_id = last_insert_id() ; ");
}

function banComment() {

    global $connection;
    
    return $connection->query(" UPDATE tblComment SET active='0' WHERE comment_id = last_insert_id() ; ");
}

function updateStudentVersion($studentID, $currentVersion) {

    global $connection;
    
    return $connection->query(" UPDATE tblStudent S SET S.current_app_version = '{$currentVersion}' WHERE S.student_id = '{$studentID}'; ");
}

function upgradeAccount($studentID, $department,$rank ) {
    global $connection;
    
    return $connection->query(" UPDATE tblStudent S SET S.department = '{$department}',S.rank = '{$rank}' WHERE S.student_id = '{$studentID}' ; ");
}

function deleteAccount($studentID ) {
    global $connection;

    $connection->query(" DELETE FROM tblStudentAnnouncement WHERE student_id = '{$studentID}' ; ");

    $connection->query(" DELETE FROM tblStudentBanned WHERE student_id = '{$studentID}' ; ");

    $connection->query(" DELETE FROM tblStudentComment WHERE student_id = '{$studentID}' ; ");

    $connection->query(" DELETE FROM tblCommunicate WHERE student_id = '{$studentID}' ; ");

    $connection->query(" DELETE FROM tblStudentClub WHERE student_id = '{$studentID}' ; ");

    $connection->query(" DELETE FROM tblStudentEvent WHERE student_id = '{$studentID}' ; ");
    
    return $connection->query(" DELETE FROM tblStudent WHERE student_id = '{$studentID}' ; ");
}

function updateAccount($studentID, $name, $surname) {
    global $connection;
    
    return $connection->query(" UPDATE tblStudent S SET S.first_name = '{$name}', S.last_name = '{$surname}' WHERE S.student_id = '{$studentID}' ; ");
}

function checkForExecution($studentID) {
    global $connection;
    
    return $connection->query(" SELECT DR.* FROM tblDatabaseReset DR WHERE DR.president_id = '{$studentID}' AND DR.vice_president_id IS NOT NULL; ");
}

function checkForWaitingExecution($studentID) {
    global $connection;
    
    return $connection->query(" SELECT DR.* FROM tblDatabaseReset DR WHERE DR.president_id = '{$studentID}' ; ");
}


function requestDBReset($studentID) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblDatabaseReset(`president_id`) VALUES ('{$studentID}') ");
}

function checkForAuthenticate($studentID) {
    global $connection;
    
    return $connection->query(" SELECT COUNT(*) AS count FROM tblDatabaseReset; ");
}

function grantDBReset($studentID) {
    global $connection;
    
    return $connection->query(" UPDATE tblDatabaseReset DR SET DR.vice_president_id = '{$studentID}' ; ");
}

function executeDBReset() {
    global $connection;

    $connection->query(" DELETE FROM tblAnnouncement; ");
    $connection->query(" DELETE FROM tblComment; ");
    $connection->query(" DELETE FROM tblCommunicate; ");
    $connection->query(" DELETE FROM tblEvent; ");
    $connection->query(" DELETE FROM tblEventPictures; ");
    $connection->query(" DELETE FROM tblMapPosition; ");
    $connection->query(" DELETE FROM tblStudent; ");
    $connection->query(" DELETE FROM tblStudentAnnouncement; ");
    $connection->query(" DELETE FROM tblStudentBanned; ");
    $connection->query(" DELETE FROM tblStudentClub; ");
    $connection->query(" DELETE FROM tblStudentComment; ");
    $connection->query(" DELETE FROM tblStudentEvent; ");
    
    return $connection->query(" DELETE FROM tblDatabaseReset; ");
}

function cancelDBReset() {
    global $connection;
    
    return $connection->query(" DELETE FROM tblDatabaseReset; ");
}


function getHouses() {
    global $connection;
    
    return $connection->query(" SELECT H.* FROM tblHouse H ; ");
}

function getRelatedHouses($studentID) {
    global $connection;
    
    return $connection->query(" SELECT SH.* FROM tblStudentHouse SH WHERE SH.student_id = '{$studentID}' ; ");
}

function updateStudentHouse() {
    global $connection;
    
    return $connection->query("  ");
}

function getClubs() {
    global $connection;
    
    return $connection->query(" SELECT C.* FROM tblClub C ; ");
}

function updateStudentClubs() {
    global $connection;
    
    return $connection->query("  ");
}

function getRelatedClubs($studentID) {
    global $connection;
    
    return $connection->query(" SELECT SC.* FROM tblStudentClub SC WHERE SC.student_id = '{$studentID}' ; ");
}

function insertToStudentChanges($studentID,$previousNameSurname, $name, $surname) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblStudentChanges(`student_id`,`previous_name_surname`, `name`, `surname`) VALUES ('{$studentID}','{$previousNameSurname}','{$name}','{$surname}') ; ");
}

function insertCalendarDates($studentID, $title, $description, $location, $date, $rank) {
    global $connection;
    
    return $connection->query(" INSERT INTO tblCalendarDates(`student_id`, `title`, `description`, `location`, `date`, `rank`) VALUES ('{$studentID}','{$title}','{$description}','{$location}','{$date}', '{$rank}' ) ; ");
}

function getCalendarDates($token) {
    global $connection;
    
    return $connection->query(" SELECT CS.* FROM tblCalendarDates CS WHERE YEAR(CS.date) >= YEAR(CURDATE()) AND CAST(CS.rank AS SIGNED) <= CAST((SELECT rank FROM tblStudent WHERE session_token = '{$token}') AS SIGNED) ; ");
}

function getOpenCalendarDates() {
    global $connection;
    
    return $connection->query(" SELECT CS.* FROM tblCalendarDates CS WHERE YEAR(CS.date) >= YEAR(CURDATE()) ; ");
}