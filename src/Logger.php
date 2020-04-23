<?php


namespace App;


use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;

class Logger
{
    protected static ?LoggerInterface $logger = null;

    public static function log($level, $message, array $context = [])
    {
        if (self::$logger === null) {
            $config = Conf::$Logs;
            $logger = new \Monolog\Logger('AppLogger');
            $logger->pushHandler(new StreamHandler($config['path'], \Monolog\Logger::toMonologLevel($config['level'])));
            self::$logger = $logger;
        }

        self::$logger->log($level, $message, $context);
    }
}
