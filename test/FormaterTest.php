<?php

namespace Bramasta\Belajar\PHP\MVC;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;
use PHPUnit\Util\Json;

class FormaterTest extends TestCase
{
    public function testFormatter()
    {
        $logger = new Logger(FormaterTest::class);

        $handler = new StreamHandler("php://stderr");
        $handler->setFormatter(new JsonFormatter());

        $logger->pushHandler($handler);
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());

        $logger->info("Belajar PHP Logging", ["username" => "bramasta"]);
        $logger->info("Belajar PHP Logging Lagi", ["username" => "bramasta"]) ;

        self::assertNotNull($logger);
    }
}