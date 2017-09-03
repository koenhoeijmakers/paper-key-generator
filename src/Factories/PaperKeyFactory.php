<?php

namespace KoenHoeijmakers\PaperKeyGenerator\Factories;

use KoenHoeijmakers\PaperKeyGenerator\PaperKeyGenerator;
use KoenHoeijmakers\PaperKeyGenerator\WordLists\EnglishWordList;
use KoenHoeijmakers\PaperKeyGenerator\WordLists\Interfaces\WordListInterface;
use KoenHoeijmakers\PaperKeyGenerator\WordLists\JapaneseWordList;

class PaperKeyFactory
{
    /**
     * Factorize a new PaperKey object with the given word list.
     *
     * @param \KoenHoeijmakers\PaperKeyGenerator\WordLists\Interfaces\WordListInterface $wordList
     * @return \KoenHoeijmakers\PaperKeyGenerator\PaperKeyGenerator
     */
    public static function create(WordListInterface $wordList)
    {
        return new PaperKeyGenerator($wordList);
    }

    /**
     * Factorize a new PaperKey object with a english word list.
     *
     * @return \KoenHoeijmakers\PaperKeyGenerator\PaperKeyGenerator
     */
    public static function english()
    {
        return self::create(new EnglishWordList());
    }
}
