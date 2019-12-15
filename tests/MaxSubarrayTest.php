<?php

declare(strict_types=1);

namespace Test;

use Exception;
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
     * @throws Exception
     */
    public function testContiguous(array $array, int $expectedMaxSubarray)
    {
        $maxSubArray = new MaxSubarray();

        static::assertSame($maxSubArray->contiguous($array), $expectedMaxSubarray);
    }

    /**
     * @return void
     */
    public function testContiguousThrowsExceptionInvalidSubarray()
    {
        $maxSubArray = new MaxSubarray();

        $invalidSubarray = [1, -2, [], 4];

        try {
            $maxSubArray->contiguous($invalidSubarray);
            static::fail(Exception::class . ' should be thrown.');
        } catch (Exception $ex) {
            static::assertContains('Input subarray is invalid.', $ex->getMessage());
        }
    }

    /**
     * @dataProvider provideTestArrays
     *
     * @param array $array
     * @param int   $expectedMaxSubarray
     *
     * @return void
     * @throws Exception
     */
    public function testContiguousInAnotherSolution(array $array, int $expectedMaxSubarray)
    {
        $maxSubArray = new MaxSubarray();

        static::assertSame($maxSubArray->contiguousInAnotherSolution($array), $expectedMaxSubarray);
    }

    /**
     * @return void
     */
    public function testContiguousInAnotherSolutionThrowsExceptionInvalidSubarray()
    {
        $maxSubArray = new MaxSubarray();

        $invalidSubarray = [1, -2, [], 4];

        try {
            $maxSubArray->contiguousInAnotherSolution($invalidSubarray);
            static::fail(Exception::class . ' should be thrown.');
        } catch (Exception $ex) {
            static::assertContains('Input subarray is invalid.', $ex->getMessage());
        }
    }

    /**
     * @return array
     */
    public function provideTestArrays(): array
    {
        //$array, $expectedMaxSubarray
        return [
            'only one positive subarray'                      => [[5], 5],
            'only one negative subarray'                      => [[-5], -5],
            'only one number 0 subarray'                      => [[0], 0],
            'mix between positive and negative numbers'       => [[-1, 1, 5, -6, 3, 0], 6],
            'only positive numbers'                           => [[1, 2, 3, 4], 10],
            'only negative numbers'                           => [[-5, -6, -3, -2], -2],
            'negative number with 0'                          => [[-5, -6, -3, -2, 0], 0],
            'number are texts'                                => [[-1, '1', '5', -6, '3', 0], 6],
            'subarray has non-numeric value'                  => [[-1, 'abc', '1', '5', -6, '3', 0], 6],
            'max subarray does not contain non-numeric value' => [[-1, '1', 'abc', '5', -6, '3', 0], 5],
        ];
    }
}
