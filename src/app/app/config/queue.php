<?php

declare(strict_types=1);

use Spiral\Queue\Driver\SyncDriver;
use Spiral\RoadRunner\Jobs\Queue\KafkaCreateInfo;
use Spiral\RoadRunner\Jobs\Queue\MemoryCreateInfo;
use Spiral\RoadRunner\Jobs\Queue\AMQPCreateInfo;
use Spiral\RoadRunner\Jobs\Queue\BeanstalkCreateInfo;
use Spiral\RoadRunner\Jobs\Queue\SQSCreateInfo;
use Spiral\RoadRunnerBridge\Queue\Queue;

return [
    'default' => env('QUEUE_CONNECTION', 'roadrunner'),

    'connections' => [
        'roadrunner' => [
            'driver' => 'roadrunner',
            'default' => 'memory',
            'pipelines' => [
                'kafka_test' => [
                    'connector' => new KafkaCreateInfo(
                        name: 'kafka_test',
                        topic: 'kafka_test',
                    ),
                    'consume' => true,
                ],
            ],
        ],
    ],

    'driverAliases' => [
        'roadrunner' => Queue::class,
    ],
];
