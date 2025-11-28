<?php

namespace App\Utils;

use Monolog;
use Monolog\Level;

class MyLog
{
    /**
     * @var \Monolog\Logger
     */
    private $log;
    private $level;
    /**
     * @param string $filename
     */
    private function __construct(string $filename, $level)
    {
        $this->level = $level;
        $this->log = new Monolog\Logger('name');
        $this->log->pushHandler(new Monolog\Handler\StreamHandler($filename, $this->level));
    }
    public static function load(string $filename, $level = Level::Info): MyLog
    {
        return new MyLog($filename, $level);
    }
    public function add(string $message): void
    {
        $this->log->log($this->level, $message);
    }
}
