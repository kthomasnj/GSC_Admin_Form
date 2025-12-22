<?php
function announcementRequest(
    $conn,
    $event_name,
    $announcement_words,
    $event_date,
    $event_start_time,
    $event_end_time,
    $running_start_time,
    $running_end_time,
    $mediaPlatform,
    $pulseSelect
) {
    
    $requester_id     = 1001;
    $campus_id        = 1;
    $ministry_id      = 4;
    //$date_added       = new DateTime();
    $request_id       = 489;
    try {
        
        // Insert into request table return id
        $sql = "INSERT INTO requestSessions (requester_id, campus_id, ministry_id, request_id)
                VALUES ($requester_id, $campus_id, $ministry_id,  $request_id)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
                ':requester_id'    => $requester_id,
                ':campus_id'       => $campus_id,
                ':ministry_id'     => $ministry_id,
                //':date_added'      => $NOW(),
                ':request_id'      => $request_id
        ]);
        $requestId = $conn->lastInsertId();

        //return true;

        $sql = "INSERT INTO requestsAnnouncement 
                (admin_request_id, event_name, event_date, event_start_time, event_end_time, anouncement_words, running_start_time, running_end_time, media_platform, pulse_location, requester_user_id)
                VALUES 
                ($requestId, '$event_name', $event_date, $event_start_time, $event_end_time, '$announcement_words', '$running_start_time', '$running_end_time', '$mediaPlatform', '$pulseSelect', $requester_id)";

        echo "<pre>$sql</pre>";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute([
                ':admin_request_id'   => $requestId,
                ':event_name'         => $event_name,
                ':event_date'         => $event_date,
                ':event_start_time'   => $event_start_time,
                ':event_end_time'     => $event_end_time,
                ':announcement_words' => $announcement_words,
                ':running_start_time' => $running_start_time,
                ':running_end_time'   => $running_end_time,
                ':media_platform'    => $mediaPlatform,
                ':pulse_location'     => $pulseSelect,
                ':requester_user_id'  => $requester_id
            
            ])) {
            //return $conn->lastInsertId();   
        }

        return false;

    } catch (PDOException $e) {
        echo "<pre>"; 
        echo "Database Error:\n";
        echo $e->getMessage(); 
        echo "</pre>"; 
        return false;
    }
}
