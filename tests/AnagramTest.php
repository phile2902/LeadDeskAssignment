<?php

namespace Test;

use Anagram\Anagram;
use PHPUnit\Framework\TestCase;

/**
 * Class AnagramTest
 * @package Test
 *
 * @see \Anagram\Anagram
 */
final class AnagramTest extends TestCase
{
    /**
     * @dataProvider provideWords
     *
     * @param string $word1
     * @param string $word2
     * @param bool   $isAnagramExpected
     *
     * @return void
     */
    public function testSomething(string $word1, string $word2, bool $isAnagramExpected)
    {
        $anagram = new Anagram();
        $isAnagram = $anagram->isAnagram($word1, $word2);

        static::assertSame($isAnagramExpected, $isAnagram);
    }

    /**
     * @return array
     */
    public function provideWords(): array
    {
        //$word1, $word2, $isAnagramExpected
        return [
            ['ABC', 'CAB', true],
            ['AABBCC', 'ABCCBA', true],
            ['ABC', 'DEF', false],
            ['ABCDEF', 'FEDCBAO', false],
        ];
    }

    /**
     * @param int $length
     *
     * @return string
     * @throws \Exception
     */
    private function generateRandomString(int $length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
