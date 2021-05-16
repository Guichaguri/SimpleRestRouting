<?php

$users = json_decode(file_get_contents('database.example.json'), true);
$response = null;

if (isset($_GET['id'])) {

    // Get user by ID
    $index = array_search($_GET['id'], array_column($users, 'id'));

    if ($index !== false) {
        $response = $users[$index];
    }

} else {

    // List all users
    $response = $users;

}

if (isset($response)) {
    die(json_encode($response));
} else {
    http_response_code(404);
}
