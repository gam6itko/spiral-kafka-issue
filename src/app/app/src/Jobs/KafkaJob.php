<?php

declare(strict_types=1);

namespace App\Jobs;

use Spiral\Queue\JobHandler;

class KafkaJob extends JobHandler
{
    public function invoke(array $payload): void
    {
        dumprr($payload);
        sleep($payload['sleep'] ?? 1);
    }
}
