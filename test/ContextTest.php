<?php

namespace Bramasta\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

use function PHPUnit\Framework\assertNotNull;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("This is log message", ["username" => "bramasta"]);
        $logger->info("Try login user", ["username" => "bramasta"]);
        $logger->info("Success login user", ["username" => "bramasta"]);

        assertNotNull($logger);
    }
}