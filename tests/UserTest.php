<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function testRuturnsFullName() {
        // Arrange
        $user = new User();
        $user->firstName = 'Teresa';
        $user->lastName = 'Green';

        // Act & Assert
        $this->assertEquals('Teresa Green', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault() {
        // Arrange
        $user = new User();

        // Act & Assert
        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function userHasFirstName() {
        // Arrange
        $user = new User();
        $user->firstName = 'Teresa';

        // Act & Assert
        $this->assertEquals('Teresa', $user->firstName);
    }

}
