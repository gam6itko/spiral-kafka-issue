<?php

declare(strict_types=1);

namespace App;

use Spiral\Queue\Options;

class UglyKafkaOptions extends Options
{
    public function __construct(
        private string $topic,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'delay' => $this->getDelay(),
            'queue' => $this->getQueue(),
            'headers' => $this->getHeaders(),

            'topic' => $this->topic
        ];
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }
}
