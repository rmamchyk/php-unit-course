<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Mockery\MockInterface;

class WeatherMonitorTest extends TestCase {

    public function tearDown(): void {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned() {
        // Arrange
        /** @var TemperatureService&MockObject */
        $service = $this->createMock(TemperatureService::class);

        $map = [
            ['12:00', 20],
            ['14:00', 26]
        ];

        $service->expects($this->exactly(2))
            ->method('getTemperature')
            ->will($this->returnValueMap($map));

        $weather = new WeatherMonitor($service);

        // Act
        $result = $weather->getAverageTemperature('12:00', '14:00');

        // Assert
        $this->assertEquals(23, $result);
    }

    public function testCorrectAverageIsReturnedWithMockery() {
        // Arrange
        /** @var TemperatureService&MockInterface */
        $service = Mockery::mock(TemperatureService::class);
        
        $service->shouldReceive('getTemperature')->once()->with('12:00')->andReturn(20);
        $service->shouldReceive('getTemperature')->once()->with('14:00')->andReturn(26);

        $weather = new WeatherMonitor($service);

        // Act
        $result = $weather->getAverageTemperature('12:00', '14:00');

        // Assert
        $this->assertEquals(23, $result);
    }
}