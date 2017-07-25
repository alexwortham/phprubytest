#!/bin/bash

echo "Testing PHP version:"
docker-compose run php
echo ""
echo "Testing Ruby version:"
docker-compose run ruby
