<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixPeRuleE extends AbstractDisambiguator implements DisambiguatorInterface
{
    public function setRule() 
    {
        $this->rule = ['prefix', 'pe-'];
    }

    // pengurangan fonem pe -> pe[m] : pe[m] - elpek -> pelpek
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pe[m]([aiueopbtsck].*)$/', $word, $matches);

        if ($contains === 1) {
            return 'p' . $matches[1];
        }
    }
}
