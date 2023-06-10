#!/bin/bash

echo "Pulling from https://github.com/suryaherdiyanto/autocms"
git pull --no-ff

echo "Building...."
docker-compose build

echo "Restarting...."
docker-compose stop
docker-compose up -d

echo "Done."
