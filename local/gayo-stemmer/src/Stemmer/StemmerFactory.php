<?php

namespace KurangKering\GayoStemmer\Stemmer;

use KurangKering\GayoStemmer\Dictionary\ArrayDictionary;

class StemmerFactory
{
    const APC_KEY = 'gayo_stemmer_cache';

    public function createStemmer($isDev = false)
    {
        $stemmer    = new Stemmer($this->createDefaultDictionary($isDev));

        $resultCache   = new Cache\ArrayCache();
        $cachedStemmer = new CachedStemmer($resultCache, $stemmer);

        return $cachedStemmer;
    }

    public function createGayoStemmer(array $kamus)
    {
        $dictionary = new ArrayDictionary($kamus);
        $stemmer    = new Stemmer($dictionary);

        $resultCache   = new Cache\ArrayCache();
        $cachedStemmer = new CachedStemmer($resultCache, $stemmer);

        return $cachedStemmer;
    }

    public function createDefaultDictionary($isDev = false)
    {
        $words      = $this->getWords($isDev);
        $dictionary = new ArrayDictionary($words);

        return $dictionary;
    }


    protected function getWords($isDev = false)
    {
        if ($isDev || !function_exists('apc_fetch')) {
            $words = $this->getWordsFromFile();
        } else {
            $words = apc_fetch(self::APC_KEY);

            if ($words === false) {
                $words = $this->getWordsFromFile();
                apc_store(self::APC_KEY, $words);
            }
        }

        return $words;
    }



    public function getWordsFromFile()
    {
        $dictionaryFile = __DIR__ . '\..\..\data\kata-dasar.txt';
        if (!is_readable($dictionaryFile)) {
            throw new \Exception('Dictionary file is missing. It seems that your installation is corrupted.');
        }

        return explode("\r\n", file_get_contents($dictionaryFile));
    }
}
