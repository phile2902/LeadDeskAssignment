<?php

namespace MaxSubarray;

/**
 * Class MaxSubarray
 * @package MaxSubarray
 * @see \Test\MaxSubarrayTest
 */
class MaxSubarray implements MaxSubarrayInterface
{
    /**
     * {@inheritDoc}
     */
    public function contiguous($array): int
    {
        //The idea is to reference from Kadane's algorithm.
        $maxSum = 0;
        $sum = 0;
        $maxValue = PHP_INT_MIN;

        foreach ($array as $value) {
            //The sum is set to 0 whenever the result of addition between it and previous sum is negative.
            //By this way, we start a new sum from next positive number
            $sum = max($sum + $value, 0);
            //Store the possible maximum subarray sum
            $maxSum = max($maxSum, $sum);
            //Store the maximum value of element in case if the array contains only negative numbers
            $maxValue = max($maxValue, $value);
        }

        //In case of max sum is equal to 0, it means that there are no positive numbers
        if ($maxSum === 0) {
            return $maxValue;
        }

        return $maxSum;
    }
}
