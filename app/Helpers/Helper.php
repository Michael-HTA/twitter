<?php

function view($fileName = null, $data = null){

    return isset($data) ? ['file' => $fileName,'data' => $data] : ['file' => $fileName];
}


function ShowTime($time){

// Convert the post datetime string to a Unix timestamp
$postTimestamp = strtotime($time);

// Get the current Unix timestamp
$currentTimestamp = time();

// Calculate the difference in seconds between the current time and the post time
$timeDifference = $currentTimestamp - $postTimestamp;

// Define time units in seconds
$minute = 60;
$hour = 60 * $minute;
$day = 24 * $hour;
$week = 7 * $day;
$month = 30 * $day;
$year = 365 * $day;

// Determine the appropriate time unit to display
if ($timeDifference < $minute) {
    $timeAgo = "Just now";
} elseif ($timeDifference < $hour) {
    $minutes = floor($timeDifference / $minute);
    $timeAgo = $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
} elseif ($timeDifference < $day) {
    $hours = floor($timeDifference / $hour);
    $timeAgo = $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
} elseif ($timeDifference < $week) {
    $days = floor($timeDifference / $day);
    $timeAgo = $days . " day" . ($days > 1 ? "s" : "") . " ago";
} elseif ($timeDifference < $month) {
    $weeks = floor($timeDifference / $week);
    $timeAgo = $weeks . " week" . ($weeks > 1 ? "s" : "") . " ago";
} elseif ($timeDifference < $year) {
    $months = floor($timeDifference / $month);
    $timeAgo = $months . " month" . ($months > 1 ? "s" : "") . " ago";
} else {
    $years = floor($timeDifference / $year);
    $timeAgo = $years . " year" . ($years > 1 ? "s" : "") . " ago";
}

// Output the time ago
return $timeAgo;


}