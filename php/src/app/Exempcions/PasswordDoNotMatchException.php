<?php

namespace BatBook\Exempcions;

class PasswordDoNotMatchException extends \GodException
{
    public function __construct($message = "Les contrasenyes no coincideixen", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
