<?php

declare(strict_types=1);

namespace App\Command;

use App\Jobs\KafkaJob;
use Spiral\Console\Command;
use Spiral\Queue\Options;
use Spiral\Queue\QueueManager;

class KafkaPushCommand extends Command
{
    public const NAME        = 'kafka-push';

    protected function perform(QueueManager $queueManager): void
    {
        $queueManager->getConnection('roadrunner')->push(
            KafkaJob::class,
            [
                'ts' => time(),
                'foo' => 'bar',
                'sleep' => rand(1, 100)
            ],
            Options::onQueue('kafka_test')
        );
    }
}
