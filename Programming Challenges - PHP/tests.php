<?php
require('part1.php');
use PHPUnit\Framework\TestCase;

final class Part1Test extends TestCase
{
    public function testPart1Test1(): void
    {
        // couple exampples that should just work.
        $this->assertEquals(
            30, sumEvenValues([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
        );

        $this->assertEquals(
            20, sumEvenValues([0, 2, 4, 6, 8])
        );

        // test with negative numbers
        $this->assertEquals(
            -30, sumEvenValues([-1, -2, -3, -4, -5, -6, -7, -8, -9, -10])
        );

        // make sure 0 does crash things
        $this->assertEquals(
            0, sumEvenValues([0, 0, 0])
        );

        // test with empty array
        $this->assertEquals(
            0, sumEvenValues([])
        );

        // test with array with only odd numbers
        $this->assertEquals(
            0, sumEvenValues([1, 3, 5, 7, 9])
        );

        // test with a mix of negative and postive numbers
        $this->assertEquals(
            6, sumEvenValues([-1, -2, -3, 4, -5, 6, -7, 8, -9, -10])
        );
    }
}