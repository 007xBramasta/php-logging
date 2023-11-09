<?php

namespace Bramasta\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ProcecorTest extends TestCase
{
    public function testProcecorRecord()
    {
        $logger = new Logger(ProcecorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(function($record){
            $record["extra"]["bram"] = [
                "app" => "Belajar PHP Logging",
                "author" => "Programmer Ganteng",
            ];
            return $record;
        });
       
        $logger->info("Hello World", ["username"=>"bram"]);
        $logger->info("Hello World");
        $logger->info("Hello World Lagi");

        self::assertNotNull($logger);
    } 
}  
    