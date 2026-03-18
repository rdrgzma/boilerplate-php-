<?php

class Env {

    private static bool $loaded = false;

    public static function load(?string $path = null): void {
        if (self::$loaded) return;

        $path = $path ?? self::findEnvFile();
        if (!$path || !file_exists($path)) return;

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) continue;

            if (!str_contains($line, '=')) continue;

            [$key, $value] = explode('=', $line, 2);
            $key   = trim($key);
            $value = trim($value, " \t\n\r\"'");

            if ($key === '') continue;

            if (!array_key_exists($key, $_ENV)) {
                $_ENV[$key] = $value;
                putenv("$key=$value");
            }
        }

        self::$loaded = true;
    }

    public static function get(string $key, mixed $default = null): mixed {
        return $_ENV[$key] ?? getenv($key) ?: $default;
    }

    private static function findEnvFile(): ?string {
        // Walk up directory tree from __FILE__ looking for .env
        $dir = __DIR__;
        for ($i = 0; $i < 5; $i++) {
            $candidate = $dir . DIRECTORY_SEPARATOR . '.env';
            if (file_exists($candidate)) return $candidate;
            $parent = dirname($dir);
            if ($parent === $dir) break;
            $dir = $parent;
        }
        return null;
    }
}
