<?php

declare(strict_types=1);

namespace App\Command;

use App\Jobs\KafkaJob;
use Spiral\Console\Command;
use Spiral\Queue\QueueConnectionProviderInterface;
use Spiral\RoadRunner\Jobs\JobsInterface;
use Spiral\RoadRunner\Jobs\KafkaOptions;

class KafkaPush1Command extends Command
{
    public const NAME = 'kafka-push1';

    protected function perform(QueueConnectionProviderInterface $provider): void
    {
        $queue = $provider->getConnection('kafka');
        //var_dump($queue);

        $queue->push(
            KafkaJob::class,
            [
                'ts' => time(),
                'foo' => 'bar',
                'sleep' => rand(1, 100)
            ],
        );
    }
}
