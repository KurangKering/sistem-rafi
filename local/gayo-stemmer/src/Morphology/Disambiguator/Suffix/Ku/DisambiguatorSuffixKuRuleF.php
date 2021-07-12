<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixKuRuleF extends AbstractDisambiguator implements DisambiguatorInterface
{
    public function setRule() 
    {
        $this->rule = ['suffix', '-ku'];
    }

    // pengurangan fonem ku -> [n]ku : [n]ku 
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*[aiueo])[n]ku$/', $word, $matches);

        if ($contains === 1) {
            return 'k' . $matches[1];
        }
    }
}
