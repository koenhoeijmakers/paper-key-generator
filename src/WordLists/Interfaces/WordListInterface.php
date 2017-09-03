<?php

namespace KoenHoeijmakers\PaperKeyGenerator\WordLists\Interfaces;

interface WordListInterface
{
    /**
     * Get the word on the given index.
     *
     * @param int $index
     * @return string
     */
    public function getWord(int $index): string;

    /**
     * Get the count of words.
     *
     * @return int
     */
    public function getWordsCount(): int;
}
