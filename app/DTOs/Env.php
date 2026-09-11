<?php

namespace App\DTOs;

class Env
{
    public function __construct(
        public string $key,
        public string $value,
        public bool $gapAfter = false,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            key: $data['key'],
            value: $data['value'],
            gapAfter: $data['gap_after'] ?? false,
        );
    }

}