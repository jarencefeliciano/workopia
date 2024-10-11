<?php

declare(strict_types=1);

/**
 * Get the base path
 *
 * @param string $path
 * @return string
 */
function basePath(string $path = ''): string
{
    return rtrim(dirname(__DIR__), '/') . '/' . ltrim($path, '/');
}

/**
 * Load a view
 *
 * @param string $name
 * @return void
 */
function loadView(string $name): void
{
    $view_path = basePath('App/Views/'.$name.'.php');

    if (file_exists($view_path)) {
        require_once $view_path;
    } else {
        echo "error";
        //throw new Exception("View {$name} not found.");
    }
}

/**
 * Load a partial
 *
 * @param string $name
 * @return void
 */
function loadPartial(string $name): void
{
    $partial_path = basePath('App/Views/partials/'.$name.'.php');

    if (file_exists($partial_path)) {
        require_once $partial_path;
    } else {
        echo "error";
        throw new Exception("View {$name} not found.");
    }
}

/**
 * Inspect a value(s)
 *
 * @param mixed $value
 * @return void
 */
function inspect(mixed $value): void
{
    echo '<pre>';
        var_dump($value);
    echo '</pre>';
}

/**
 * Inspect a value(s)
 *
 * @param mixed $value
 * @return void
 */
function inspectAndDie(mixed $value): void
{
    echo '<pre>';
        die(var_dump($value));
    echo '</pre>';
}
