<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase {

    public function testMock() {
        /** @var MockObject */
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        $this->assertTrue($result);
    }

}