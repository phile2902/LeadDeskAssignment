<?php

namespace Test;

use MaxSubarray\MaxSubarray;
use PHPUnit\Framework\TestCase;

/**
 * Class MaxSubarrayTest
 * @package Test
 * @see \MaxSubarray\MaxSubarray
 */
final class MaxSubarrayTest extends TestCase
{
    /**
     * @dataProvider provideTestArrays
     *
     * @param array $array
     * @param int   $expectedMaxSubarray
     *
     * @return void
     */
    public function testContiguous(array $array, int $expectedMaxSubarray)
    {
        $maxSubArray = new MaxSubarray();

        static::assertSame($maxSubArray->contiguous($array), $expectedMaxSubarray);
    }

    /**
     * @return array
     */
    public function provideTestArrays(): array
    {
        //$array, $expectedMaxSubarray
        return [
            'mix between positive and negative numbers' => [[-1, 1, 5, -6, 3, 0], 6],
            'only positive numbers'                     => [[1, 2, 3, 4], 10],
            'only negative numbers'                     => [[-5, -6, -3, -2], -2],
            'negative number with 0'                    => [[-5, -6, -3, -2, 0], 0],
            'number are texts'                          => [[-1, '1', '5', -6, '3', 0], 6],
        ];
    }
}
