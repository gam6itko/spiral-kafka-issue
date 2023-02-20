<?php

declare(strict_types=1);

namespace App\Command;

use App\Jobs\KafkaJob;
use Spiral\Console\Command;
use Spiral\RoadRunner\Jobs\JobsInterface;
use Spiral\RoadRunner\Jobs\KafkaOptions;

class KafkaPushCommand extends Command
{
    public const NAME = 'kafka-push';

    protected function perform(JobsInterface $jobs): void
    {
        $queue = $jobs->connect('kafka_test', new KafkaOptions('kafka_test'));
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
