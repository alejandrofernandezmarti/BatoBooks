<?php

namespace BatBook\Exempcions;

class InvalidEmailException extends \GodException {
    public function __construct($message = "Email Invàlid", $code = 0, \Exception $previous = null){
        parent::__construct($message, $code, $previous);
    }
}
