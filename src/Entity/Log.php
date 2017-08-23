<?php

namespace src\Entity;

/**
 * Class Log
 * @package src\Entity
 */
class Log
{

    /**
     * @var string $access
     */
    private $access;

    /**
     * @var string $errors
     */
    private $errors;

    /**
     * Log constructor.
     */
    public function __construct()
    {
        $this->access = "tmp/logs/access.log";
        $this->errors = "tmp/logs/errors.log";

        if (!file_exists($this->access)){
            file_put_contents($this->access, "");
        }

        if (!file_exists($this->errors)){
            file_put_contents($this->errors, "");
        }
    }

    public function writeAccessLog($type, $message)
    {
        file_put_contents($this->access, "[".$type."] ".date("[j/m/y H:i:s]")." - $message \r\n", FILE_APPEND | LOCK_EX);
    }

    public function writeErrorLog($message, $type)
    {
        file_put_contents($this->errors, "[".$type."] ".date("[j/m/y H:i:s]")." - $message \r\n", FILE_APPEND | LOCK_EX);
    }
}
