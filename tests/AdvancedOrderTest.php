<?php

use PHPUnit\Framework\TestCase;
use Mockery\MockInterface;

class AdvancedOrderTest extends TestCase {

    public function tearDown(): void {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingMock() {
        // Arrange
        $order = new AdvancedOrder(3, 1.99);
        $this->assertEquals(5.97, $order->amount);

        /** @var PaymentGateway&MockInterface */
        $mock = Mockery::mock('PaymentGateway');
        $mock->shouldReceive('charge')
            ->once()
            ->with(5.97);

        // Act & Assert
        $order->process($mock);
    }

    public function testOrderIsProcessedUsingSpy() {
        // Arrange
        $order = new AdvancedOrder(3, 1.99);
        $this->assertEquals(5.97, $order->amount);

        /** @var PaymentGateway&MockInterface */
        $spy = Mockery::spy('PaymentGateway');

        // Act
        $order->process($spy);

        // Assert
        $spy->shouldHaveReceived('charge')
            ->once()
            ->with(5.97);
    }
}