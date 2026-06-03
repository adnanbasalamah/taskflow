<?php

function validate_required(array $data, array $fields): ?string
{
    foreach ($fields as $field) {
        if (!isset($data[$field]) || trim((string) $data[$field]) === '') {
            return "Field '$field' is required";
        }
    }
    return null;
}

function validate_string_length(string $value, int $min = 1, int $max = 255): ?string
{
    $len = strlen(trim($value));
    if ($len < $min || $len > $max) {
        return "Must be between $min and $max characters";
    }
    return null;
}

function sanitize_string(string $value): string
{
    return htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');
}
