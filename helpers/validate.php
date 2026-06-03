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

function sanitize_content(string $value): string
{
    $allowed = '<div><span><b><strong><i><em><u><ul><ol><li><br><p><h1><h2><h3><h4><h5><h6><a><pre><code><table><thead><tbody><tr><th><td><blockquote>';
    $value = strip_tags(trim($value), $allowed);
    $value = preg_replace_callback('/<(\w+)([^>]*)>/i', function ($m) {
        $tag = $m[1];
        $attrs = $m[2];
        $keep = [];
        if (preg_match('/\bclass\s*=\s*"([^"]*)"/i', $attrs, $c)) {
            $keep[] = 'class="' . htmlspecialchars($c[1], ENT_QUOTES, 'UTF-8') . '"';
        }
        if (preg_match_all('/\b(data-\w+)\s*=\s*"([^"]*)"/i', $attrs, $ds)) {
            foreach ($ds[1] as $i => $name) {
                $keep[] = $name . '="' . htmlspecialchars($ds[2][$i], ENT_QUOTES, 'UTF-8') . '"';
            }
        }
        return '<' . $tag . ($keep ? ' ' . implode(' ', $keep) : '') . '>';
    }, $value);
    return $value;
}
