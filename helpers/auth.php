<?php

function is_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}

function require_login(): void
{
    if (!is_logged_in()) {
        error_response('Unauthorized', 401);
    }
}

function current_user_id(): ?int
{
    return $_SESSION['user_id'] ?? null;
}
