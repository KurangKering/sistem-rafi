<?php

namespace KurangKering\GayoStemmer\Stemmer;

class CachedStemmer implements StemmerInterface
{
    protected $cache;

    protected $delegatedStemmer;

    public function __construct(Cache\CacheInterface $cache, StemmerInterface $delegatedStemmer)
    {
        $this->cache = $cache;
        $this->delegatedStemmer = $delegatedStemmer;
    }
    public function detailStem($text)
    {
        $normalizedText = Filter\TextNormalizer::normalizeText($text);

        if ($this->cache->has($normalizedText)) {
            $stems = $this->cache->get($normalizedText);
        } else {
            $stem = $this->delegatedStemmer->detailStem($normalizedText);
            $this->cache->set($normalizedText, $stem);
            $stems = $stem;
        }

        return $stems; 
    }

    public function stem($text)
    {
        $normalizedText = Filter\TextNormalizer::normalizeText($text);

        $words = explode(' ', $normalizedText);
        $stems = array();

        foreach ($words as $word) {
            if ($this->cache->has($word)) {
                $stems[] = $this->cache->get($word);
            } else {
                $stem = $this->delegatedStemmer->stem($word);
                $this->cache->set($word, $stem);
                $stems[] = $stem;
            }
        }

        return implode(' ', $stems);
    }

    public function getCache()
    {
        return $this->cache;
    }

    public function getDelegatedStemmer()
    {
        return $this->delegatedStemmer;
    }
}
