<?php

namespace KoenHoeijmakers\PaperKeyGenerator\WordLists;

use KoenHoeijmakers\PaperKeyGenerator\WordLists\Exceptions\WordListException;
use KoenHoeijmakers\PaperKeyGenerator\WordLists\Interfaces\WordListInterface;

abstract class WordList implements WordListInterface
{
    /**
     * List of words.
     *
     * @var array
     */
    protected $words = [];

    /**
     * Flipped list of words.
     *
     * @var array
     */
    protected $flippedWords = [];

    /**
     * WordList constructor.
     */
    public function __construct()
    {
        $this->flipWords();
    }

    /**
     * Get the word on the given index.
     *
     * @param int $index
     * @return string
     * @throws \KoenHoeijmakers\PaperKeyGenerator\WordLists\Exceptions\WordListException
     */
    public function getWord(int $index): string
    {
        $words = $this->getWords();

        if (!array_key_exists($index, $words)) {
            throw new WordListException('No word found on index "' . $index . '"');
        }

        return $words[$index];
    }

    /**
     * Get the array of words.
     *
     * @return array
     */
    public function getWords(): array
    {
        return $this->words;
    }

    /**
     * Get the index of the given word.
     *
     * @param string $word
     * @return int
     * @throws \KoenHoeijmakers\PaperKeyGenerator\WordLists\Exceptions\WordListException
     */
    public function getWordIndex(string $word): int
    {
        $words = $this->getFlippedWords();

        if (!array_key_exists($word, $words)) {
            throw new WordListException('No index found for word "' . $word . '"');
        }

        return $words[$word];
    }

    /**
     * Get the array of flipped words.
     *
     * @return array
     */
    public function getFlippedWords(): array
    {
        return $this->flippedWords;
    }

    /**
     * Get the count of words.
     *
     * @return int
     */
    public function getWordsCount(): int
    {
        return count($this->words);
    }

    /**
     * Flips the words for quicker lookup.
     *
     * @return void
     */
    protected function flipWords()
    {
        $this->flippedWords = array_flip($this->words);
    }
}
