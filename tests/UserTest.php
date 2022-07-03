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

    public function testNotificationIsSent() {
        // Arrange
        $user = new User();
        $user->email = 'dave@example.com';

        /** @var mixed */
        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user->setMailer($mockMailer);
        
        // Act & Assert
        $this->assertTrue($user->notify('Hello'));
    }

    public function testCannotNotifyUserWithNoEmail() {
        // Arrange
        $user = new User();

        /** @var mixed */
        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();

        $user->setMailer($mockMailer);

        // Act & Assert
        $this->expectException(Exception::class);
        $user->notify('Hello');
    }

}
