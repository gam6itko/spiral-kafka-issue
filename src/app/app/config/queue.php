<?php

declare(strict_types=1);

use App\KafkaDriver;
use Spiral\RoadRunnerBridge\Queue\Queue;

return [
    'default' => env('QUEUE_CONNECTION', 'roadrunner'),

    'connections' => [
        'kafka' => [
            'driver' => 'kafka',
            'pipeline' => 'kafka_test',
            'topic' => 'kafka_test',
        ],
    ],

    'driverAliases' => [
        'roadrunner' => Queue::class,
        'kafka' => KafkaDriver::class,
    ],
];
