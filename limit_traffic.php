<?php


$max_requests_per_minute = 100;
// Get the current minute
$current_minute = (int) (time() / 60);
// Check if the rate limit has been exceeded
if (isset($_SESSION['last_request_minute']) &&
    $_SESSION['last_request_minute'] == $current_minute &&
    $_SESSION['request_count'] >= $max_requests_per_minute) {
    header("HTTP/1.1 429 Too Many Requests");
    echo "Error: You have exceeded the maximum number of requests per minute.";
    exit;
}

$_SESSION['last_request_minute'] = $current_minute;
$_SESSION['request_count'] = isset($_SESSION['request_count']) ?
    $_SESSION['request_count'] + 1 : 1;

?>