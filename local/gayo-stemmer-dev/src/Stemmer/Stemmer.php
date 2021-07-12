<?php

namespace KurangKering\GayoStemmerDev\Stemmer;

use KurangKering\GayoStemmerDev\Dictionary\DictionaryInterface;
use KurangKering\GayoStemmerDev\Stemmer\Context\Context;
use KurangKering\GayoStemmerDev\Stemmer\Context\Visitor\VisitorProvider;

class Stemmer implements StemmerInterface
{
    protected $dictionary;

    protected $visitorProvider;

    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary      = $dictionary;
        $this->visitorProvider = new VisitorProvider();
    }

    public function getDictionary()
    {
        return $this->dictionary;
    }

    public function detailStem($text)
    {
        $normalizedText = Filter\TextNormalizer::normalizeText($text);

        $stem = $this->stemDetailWord($normalizedText);

        return $stem; 
    }
    public function stem($text)
    {
        $normalizedText = Filter\TextNormalizer::normalizeText($text);

        $words = explode(' ', $normalizedText);
        $stems = array();

        foreach ($words as $word) {
            $stems[] = $this->stemWord($word);
        }

        return implode(' ', $stems);
    }

    protected function stemWord($word)
    {
        return $this->stemSingularWord($word);
    }


    protected function stemDetailWord($word)
    {
        $context = new Context($word, $this->dictionary, $this->visitorProvider);
        $context->execute();

        return $context->getResultDetail();
    }

    protected function stemSingularWord($word)
    {
        $context = new Context($word, $this->dictionary, $this->visitorProvider);
        $context->execute();

        return $context->getResult();
    }
}
