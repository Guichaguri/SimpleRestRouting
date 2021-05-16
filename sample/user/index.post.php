<?php

$users = json_decode(file_get_contents('database.example.json'), true);

$user = json_decode(file_get_contents("php://input"), true);

$users[] = $user;

file_put_contents('database.example.json', json_encode($users));

http_response_code(200);
die(json_encode($user));
