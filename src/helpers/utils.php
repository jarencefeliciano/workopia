<?php

declare(strict_types=1);

/**
 * Get the base path
 *
 * @param string $path
 * @return string
 */
function basePath(string $path = ''): string {
  return rtrim(dirname(__DIR__), '/') . '/' . ltrim($path, '/');
}
