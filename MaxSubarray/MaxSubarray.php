<?php

declare(strict_types=1);

namespace MaxSubarray;

use Exception;

/**
 * Class MaxSubarray
 * @package MaxSubarray
 * @see \Test\MaxSubarrayTest
 */
class MaxSubarray implements MaxSubarrayInterface
{
    /**
     * This solution uses Brute Force approach. Calculating all possible sum of contiguous subarray which not include
     * the non-numeric value and choose the maximum sum.
     * The idea is to start at all indexes in the arrays and calculate sum of subarray starting from the index to the
     * last index of the input array. Time complexity is O(n^2) because it uses two loops.
     *
     * @param array $array
     *
     * @return int
     * @throws Exception
     */
    public function contiguousInAnotherSolution(array $array): int
    {
        $maxSum = PHP_INT_MIN;
        $arrayLength = count($array);

        //This loop points to the start index
        for ($i = 0; $i < $arrayLength; $i++) {
            $sum = 0;
            //This loop will try to calculate possible sum of subarray from the pointed index to the last index
            //Then compare it to the maximum sum
            for ($j = $i; $j < $arrayLength; $j++) {
                //If the input subarray is empty, throw an Exception
                if ($array[$j] === '') {
                    throw new Exception('Input subarray is invalid.');
                }

                //When the value is non-numeric, the loop should break because max subarray will not contain non-numeric value
                if (!is_numeric($array[$j])) {
                    break;
                }

                $sum += $array[$j];
                $maxSum = max($sum, $maxSum);
            }
        }

        return $maxSum;
    }

    /**
     * {@inheritDoc}
     *
     * @throws Exception
     *
     * The Brute Force solution is not so good because it calculates sum of all possible contiguous subarray which we
     * can improve to calculate just necessary ones. Two for loops can be reduced to one for loop so the time complexity
     * can be improved too.
     *
     * The idea of this solution is to reference from Kadane's algorithm.
     * Loop through the array, we realize that the possible maximum subarray value is the current subarray value or sum of
     * maximum sum of previous subarray values with the current subarray value.
     * Time complexity is O(n) because it uses only one for loop.
     *
     */
    public function contiguous(array $array): int
    {
        $maxSumInFinal = 0;
        $maxSumAtCurrent = 0;
        $maxValue = PHP_INT_MIN;

        foreach ($array as $value) {
            //If the input subarray is empty, throw an Exception
            if ($value === '') {
                throw new Exception('Input subarray is invalid.');
            }

            //When the value is non-numeric, the loop should continue and refresh maximum sum at current because max
            // subarray will not contain non-numeric value
            if (!is_numeric($value)) {
                $maxSumAtCurrent = 0;
                continue;
            }

            //The sum is set to 0 whenever the result of addition between it and previous sum is negative.
            //Like the above explanation, the possible maximum subarray is the current subarray or sum of
            // the previous sum and the current subarray. If the previous sum is negative so maximum sum at current
            // should be the current subarray
            $maxSumAtCurrent = max($maxSumAtCurrent + $value, 0);
            //Store the possible maximum subarray sum in final
            $maxSumInFinal = max($maxSumInFinal, $maxSumAtCurrent);
            //Store the maximum value of element in case if the array contains only negative numbers
            $maxValue = max($maxValue, $value);
        }

        //In case of max sum in final is equal to 0, it means that there are no positive numbers
        if ($maxSumInFinal === 0) {
            return $maxValue;
        }

        return $maxSumInFinal;
    }
}
