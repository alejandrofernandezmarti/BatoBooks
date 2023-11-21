<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class GodException extends \Exception{

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null){
        $log = new Logger('Excepcio');
        $log->pushHandler(new StreamHandler('../../logs/exception.log',Logger::DEBUG));
        $log->info("Excepcio llançada ");
        parent::__construct($message, $code, $previous);
    }

}