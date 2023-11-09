<?php

namespace Bramasta\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LevelTest extends TestCase
{
    public function testLevel()
    {
        $logger = new Logger(LevelTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));    
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::ERROR));

        $logger->debug("This is Debug");
        $logger->info("This is Info");
        $logger->notice("This is Notice");
        $logger->warning("This is Warning");
        $logger->error("This is Error");
        $logger->critical("This is Critical");
        $logger->alert("This is Alert");
        $logger->emergency("This is Emergency");

        self::assertNotNull($logger);
    }
}