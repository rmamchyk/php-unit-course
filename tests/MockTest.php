<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class MockTest extends TestCase {

    public function testMock() {
        /** @var Mailer&MockObject */
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        $this->assertTrue($result);
    }

}