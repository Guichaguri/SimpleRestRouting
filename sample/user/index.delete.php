<?php

if (!isset($_GET['id'])) {

    // ID not set
    http_response_code(400);
    die();

}

$users = json_decode(file_get_contents('database.example.json'), true);

// Get user by ID
$index = array_search($_GET['id'], array_column($users, 'id'));

if ($index !== false) {

    unset($users[$index]);
    file_put_contents('database.example.json', json_encode($users));

    http_response_code(200);

} else {

    http_response_code(404);

}