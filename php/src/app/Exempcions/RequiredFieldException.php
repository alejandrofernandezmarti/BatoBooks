<?php

namespace BatBook\Exempcions;

class RequiredFieldException extends \GodException
{
    public function __construct($message = "Camp requerit", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
