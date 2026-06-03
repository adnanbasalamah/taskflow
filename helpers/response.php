<?php

function json_response(mixed $data, int $code = 200): void
{
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function error_response(string $message, int $code = 400): void
{
    json_response(['error' => $message], $code);
}

function success_response(mixed $data = null, string $message = 'OK', int $code = 200): void
{
    $res = ['message' => $message];
    if ($data !== null) {
        $res['data'] = $data;
    }
    json_response($res, $code);
}
