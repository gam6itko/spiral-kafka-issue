<?php

declare(strict_types=1);

namespace App\Jobs;

use Spiral\Logger\Traits\LoggerTrait;
use Spiral\Queue\JobHandler;

class KafkaJob extends JobHandler
{
    use LoggerTrait;

    public function invoke(array $payload): void
    {
        var_dump($payload);
        $this->getLogger()->info(KafkaJob::class, $payload);
        sleep($payload['sleep'] ?? 1);
    }
}
