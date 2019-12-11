<?php

namespace Anagram;

/**
 * Class Anagram
 * @package Anagram
 * @see \Test\AnagramTest
 */
class Anagram implements AnagramInterface
{
    /**
     * {@inheritDoc}
     */
    public function isAnagram($word1, $word2): bool
    {
        //The idea is to get arrays of information of words by function count_chars https://www.php.net/manual/en/function.count-chars.php
        //Then comparing two arrays. If they are equals so they are anagrams
        return count_chars($word1, 1) === count_chars($word2, 1);
    }
}
