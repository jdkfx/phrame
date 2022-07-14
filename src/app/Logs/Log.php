<?php

namespace App\Logs;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    public function __construct(){}

    public function writeLog($name, $message): void
    {
        $log = new Logger($name);

        $log->pushHandler(new StreamHandler(__DIR__ . '/../../log/' . $name . '.log', Logger::INFO));
        $log->info($message);
    }
}
