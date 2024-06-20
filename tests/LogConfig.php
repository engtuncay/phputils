<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
global $log;
$log = new Logger('logentegre');
$log->pushHandler(new StreamHandler('./tests/logs/logdosyam.log', Logger::WARNING));