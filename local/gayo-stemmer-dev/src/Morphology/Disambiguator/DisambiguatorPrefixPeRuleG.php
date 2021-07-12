<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixPeRuleG extends AbstractDisambiguator implements DisambiguatorInterface
{
    public function setRule() 
    {
        $this->rule = ['prefix', 'pe-'];
    }

  // pengurangan fonem pe -> pe[m] : pe[m] - elpek -> pelpek
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pe[n]([aiueopbtsck].*)$/', $word, $matches);

        if ($contains === 1) {
            return 'k' . $matches[1];
        }
    }
}
