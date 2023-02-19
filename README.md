# spiral kafka issue

## init

```shell
docker-compose up -d
```

## bug

```shell
docker-compose exec app  php app.php kafka-push
```

command output
```
$ docker-compose exec app  php app.php kafka-push
[Spiral\RoadRunner\Jobs\Exception\JobsException]
Error 'rpc_push:
        jobs_plugin_push:
        kafka_push:
        kafka_handle_item: kafka server: The request attempted to perform an operation on an invalid topic' on tcp://127.0.0.1:6001
in vendor/spiral/roadrunner-jobs/src/Queue/Pipeline.php:97

Previous: [Spiral\Goridge\RPC\Exception\ServiceException]
Error 'rpc_push:
        jobs_plugin_push:
        kafka_push:
        kafka_handle_item: kafka server: The request attempted to perform an operation on an invalid topic' on tcp://127.0.0.1:6001
in vendor/spiral/goridge/src/RPC/RPC.php:151
```

rr logs
```
2023-02-19T17:55:02.282Z ERROR   kafka           producer error  {"message": {"Topic":"","Key":{},"Value":{},"Headers":[{"Key":"cnJfam9i","Value":"QXBwXEpvYlxLYWZrYUpvYg=="},{"Key":"cnJfcGlwZWxpbmU=","Value":"a2Fma2FfdGVzdA=="},{"Key":"cnJfcHJpb3JpdHk=","Value":"CgAAAAAAAAA="}],"Metadata":"","Offset":0,"Partition":0,"Timestamp":"2023-02-19T17:55:02.282466318Z"}, "error": "kafka server: The request attempted to perform an operation on an invalid topic"}
2023-02-19T17:55:02.282Z ERROR   jobs            job push error  {"ID": "0895e464-36d8-420f-8855-b882169f1f74", "pipeline": "kafka_test", "driver": "kafka", "start": "2023-02-19T17:55:02.282Z", "elapsed": "79.248µs", "error": "kafka_push:\n\tkafka_handle_item: kafka server: The request attempted to perform an operation on an invalid topic"}
```
