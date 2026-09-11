<?php

namespace App\Service;

use App\DTOs\Env;

class ParseEnvFile
{
    /**
     * @param string $data
     * @return array<string, string>
     */
    public function parse(string $data): array
    {
        $data = str_replace("\r", '', $data);
        $data = explode("\n", $data);
        $envData = [];
        foreach ($data as $index => $line) {
            if ($this->isComment($line)) {
                continue;
            }
            $line = trim($line);
            if (str_contains($line, '=')) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                $envData[$index] = new Env(
                    key: $key,
                    value: $value,
                    gapAfter: !str_contains($data[$index + 1] ?? '=', '='),
                );
            }
        }
        return $envData;
    }

    private function isComment(string $line): bool
    {
        return str_starts_with($line, '#');
    }
}