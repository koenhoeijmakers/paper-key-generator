<?php

namespace KoenHoeijmakers\PaperKeyGenerator;

use KoenHoeijmakers\PaperKeyGenerator\WordLists\Interfaces\WordListInterface;

class PaperKeyGenerator
{
    /**
     * The word count.
     *
     * @var int
     */
    protected $count = 12;

    /**
     * The word divider.
     *
     * @var string
     */
    protected $divider = ' ';

    /**
     * The WordList implementation.
     *
     * @var \KoenHoeijmakers\PaperKeyGenerator\WordLists\WordList
     */
    protected $wordList;

    /**
     * PaperKey constructor.
     *
     * @param \KoenHoeijmakers\PaperKeyGenerator\WordLists\Interfaces\WordListInterface $wordList
     */
    public function __construct(WordListInterface $wordList)
    {
        $this->setWordList($wordList);
    }

    /**
     * Make a new PaperKey string.
     *
     * @param array $options
     * @return string
     */
    public function make(array $options = [])
    {
        $count = $options['count'] ?? $this->count;
        $divider = $options['divider'] ?? $this->divider;

        $words = [];

        for ($iterator = 0; $iterator < $count; $iterator++) {
            $words[] = $this->wordList->getWord(
                $this->getRandomInteger()
            );
        }

        return implode($divider, $words);
    }

    /**
     * Set the WordList to use.
     *
     * @param \KoenHoeijmakers\PaperKeyGenerator\WordLists\Interfaces\WordListInterface $wordList
     * @return $this
     */
    public function setWordList(WordListInterface $wordList): self
    {
        $this->wordList = $wordList;

        return $this;
    }

    /**
     * Set the count.
     *
     * @param $count
     * @return \KoenHoeijmakers\PaperKeyGenerator\PaperKeyGenerator
     */
    public function setCount($count): self
    {
        $this->count = (int) $count;

        return $this;
    }

    /**
     * Set the divider.
     *
     * @param $divider
     * @return \KoenHoeijmakers\PaperKeyGenerator\PaperKeyGenerator
     */
    public function setDivider($divider): self
    {
        $this->divider = $divider;

        return $this;
    }

    /**
     * Get a cryptographically secure integer.
     *
     * @return int
     */
    private function getRandomInteger()
    {
        return random_int(0, $this->wordList->getWordsCount());
    }
}
