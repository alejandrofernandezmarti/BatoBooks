<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class MyLog{
    public static function getLogger(string $canal = "acces"): LoggerInterface {
        $log = new \Monolog\Logger(ucfirst($canal)."Logger");
        $file = $_SERVER['DOCUMENT_ROOT']."/logs".$canal."log";
        $log->pushHandler(new StreamHandler($file,Logger::DEBUG));
        return $log;
    }
}