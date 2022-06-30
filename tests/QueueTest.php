<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
    protected $queue;

    protected function setUp(): void {
       $this->queue = new Queue();
    }

    public function testNewQueueIsEmpty() {
        // Act & Assert
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue() {
        // Act
        $this->queue->push('green');

        // Assert
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue() {
        // Arrange
        $this->queue->push('green');

        // Act
        $item = $this->queue->pop();

        // Assert
        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
        // Arrange
        $this->queue->push('first');
        $this->queue->push('second');

        // Act
        $item = $this->queue->pop();

        // Assert
        $this->assertEquals('first', $item);
    }

    public function testMaxNumberOfItemsCanBeAdded() {
        // Arrange
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        // Assert
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue() {
        // Arrange
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        // Act & Asssert
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');

        $this->queue->push('water thin mint');
    }
}
