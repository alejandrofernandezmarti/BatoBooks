<?php

function printError($errors,$field): mixed
{
    if (isset($errors[$field])) {
        return $errors[$field];
    }
    return "";
}
