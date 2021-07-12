<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixPeRuleD extends AbstractDisambiguator implements DisambiguatorInterface
{
    public function setRule() 
    {
        $this->rule = ['prefix', 'pe-'];
    }

    // pengurangan fonem pe -> pe[n] : pe[n] - ulis -> tulis
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pe[n]([aiueopbtsck].*)$/', $word, $matches);

        if ($contains === 1) {
            return 't' . $matches[1];
        }
    }
}
