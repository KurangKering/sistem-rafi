<?php

namespace KurangKering\GayoStemmerDev\Dictionary;

class ArrayDictionary implements DictionaryInterface
{
    protected $words = array();

    public function __construct(array $words = array())
    {
        $this->addWords($words);
    }

    public function getWords()
    {
        return $this->words;
    }

    public function contains($word)
    {
        return isset($this->words[$word]);
    }

    public function count()
    {
        return count($this->words);
    }

    public function addWords(array $words)
    {
        foreach ($words as $word) {
            $this->add($word);
        }
    }

    public function add($word)
    {
        if ($word === '') {
            return;
        }

        $this->words[$word] = $word;
    }

    public function remove($word)
    {
        unset($this->words[$word]);
    }

    public function addWordsFromTextFile($filePath, $delimiter = "\n")
    {
        $words = explode($delimiter, file_get_contents($filePath));
        $this->addWords($words);
    }
}
