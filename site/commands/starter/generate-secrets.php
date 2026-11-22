<?php

declare(strict_types=1);

use Kirby\CLI\CLI;
use Kirby\Filesystem\F;

return [
    'description' => 'Generates missing application security secrets.',
    'command' => static function (CLI $cli): void {
        $environmentPath = $cli->kirby()->root('index') . '/.env';
        $environment = F::read($environmentPath);

        if ($environment === false) {
            throw new RuntimeException('Could not read the .env file.');
        }

        $lineEnding = str_contains($environment, "\r\n") ? "\r\n" : "\n";
        $lines = preg_split('/\r\n|\r|\n/', $environment);

        if ($lines === false) {
            throw new RuntimeException('Could not read the .env file.');
        }

        $generated = [];
        $appended = false;

        foreach (['APP_CONTENT_SALT', 'APP_COOKIE_KEY'] as $key) {
            $matches = [];

            foreach ($lines as $index => $line) {
                if (preg_match('/^\s*(?:export\s+)?' . preg_quote($key, '/') . '\s*=(.*)$/', $line, $match) === 1) {
                    $matches[$index] = trim($match[1]);
                }
            }

            if (count($matches) > 1) {
                throw new RuntimeException('The .env file contains duplicate entries for ' . $key . '.');
            }

            // Match the env loader's handling of reserved values such as null, false and empty.
            $value = env($key);

            if (is_string($value) && empty($value) === false) {
                continue;
            }

            if ($matches !== []) {
                $index = array_key_first($matches);
                $lines[$index] = $key . '=' . bin2hex(random_bytes(32));
            } else {
                if ($appended === false && end($lines) !== '') {
                    $lines[] = '';
                }

                $lines[] = $key . '=' . bin2hex(random_bytes(32));
                $appended = true;
            }

            $generated[] = $key;
        }

        if ($generated === []) {
            $cli->success('Application security secrets are already configured.');
            return;
        }

        if (end($lines) !== '') {
            $lines[] = '';
        }

        if (F::write($environmentPath, implode($lineEnding, $lines)) !== true) {
            throw new RuntimeException('Could not update the .env file.');
        }

        $cli->success('Generated ' . implode(' and ', $generated) . '.');
    },
];
