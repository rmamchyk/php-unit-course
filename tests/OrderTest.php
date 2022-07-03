<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {

    public function testOrderIsProcessed() {
        // Arrange
        /** @var mixed */
        $gateway = $this->getMockBuilder('PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();
        
        $gateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);
        
        $order = new Order($gateway);
        $order->amount = 200;

        // Act & Assert
        $this->assertTrue($order->process());
    }

}