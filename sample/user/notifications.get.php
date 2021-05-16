<?php

$response = [
    [
        'id' => 0,
        'message' => 'John liked your post'
    ],
    [
        'id' => 1,
        'message' => 'Joana liked your comment'
    ]
];

die(json_encode($response));
