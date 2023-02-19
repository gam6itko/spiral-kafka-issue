#!/bin/bash

mkdir -p ./runtime
chmod -R a+rw ./runtime

composer install

php app.php cache:clean -v

rr serve -d
