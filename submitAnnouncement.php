<?php
//Display php error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/getConnection.php";
require_once __DIR__ . "/announcementRequest.php";

// Get connection
$conn = connectionHandle::getInstance()->connectionHandle();

// Form data
$event_name             = $_POST['announcementTitle'] ?? '';
$announcement_words     = $_POST['announcementDetails'] ?? '';
$event_date             = $_POST['event_date'] ?? '';
$event_start_time       = $_POST['event_start_time'] ?? '';
$event_end_time         = $_POST['event_end_time'] ?? '';
$running_start_time     = $_POST['running_start_time'] ?? '';
$running_end_time       = $_POST['running_end_time'] ?? '';
$mediaPlatform         = $_POST['mediaPlatform'] ?? [];
$pulseSelect            = $_POST['pulseSelect'] ?? [];

// Get selection list
$media_Platform = implode(", ", $media_Platform);
$pulseSelect    = implode(", ", $pulseSelect);

// Insert data
$announcementId = announcementRequest(
    $conn,
    $event_name,
    $announcement_words,
    $event_date,
    $event_start_time,
    $event_end_time,
    $running_start_time,
    $running_end_time,
    $media_Platform,
    $pulseSelect
);

if ($announcementId) {
    echo "Announcement submitted successfully. ID: " . $announcementId;
} else {
    echo "Error submitting announcement.";
}
