<?php

declare(strict_types=1);

namespace Anagram;

/**
 * Class Anagram
 * @package Anagram
 * @see \Test\AnagramTest
 */
class Anagram implements AnagramInterface
{
    /**
     * The idea of this solution is to split the string to array of characters. Sort the string in the ASC order and
     * compare between two words.
     * Time complexity is O(nlogn) and in worst case, it is O(n^2) because built in function sort uses QuickSort algorithm
     *
     * @param string $word1
     * @param string $word2
     *
     * @return bool
     */
    public function isAnagramInAnotherSolution(string $word1, string $word2): bool
    {
        //If lengths of them are different, they are not anagrams
        if (strlen($word1) !== strlen($word2)) {
            return false;
        }

        return $this->toSortedArray($word1) === $this->toSortedArray($word2);
    }

    /**
     * {@inheritDoc}
     *
     * Built in function count_chars in php https://www.php.net/manual/en/function.count-chars.php will give information
     * about ASCII characters used in string.
     * If words are anagrams, they should have the same information of characters.
     * This solution's time complexity is O(N) because the function count_chars will loop N times, full length of the input word.
     *
     * For me, i will choose this solution for this issue because it is shorter, cleaner and good enough complexity.
     *
     */
    public function isAnagram(string $word1, string $word2): bool
    {
        return count_chars($word1, 1) === count_chars($word2, 1);
    }

    /**
     * @param string $word
     *
     * @return array
     */
    private function toSortedArray(string $word): array
    {
        //Split the string to array of characters
        $wordInArray = str_split($word);
        //Sort the array in ASC order
        sort($wordInArray);

        return $wordInArray;
    }
}
