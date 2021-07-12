<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixMuRuleG extends AbstractDisambiguator implements DisambiguatorInterface
{
    public function setRule() 
    {
        $this->rule = ['prefix', 'mu-'];
    }

    // pengurangan fonem mu -> mu[m] : mu[m] - elpek -> pelpek
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mu[n]([aiueopbtsck].*)$/', $word, $matches);

        if ($contains === 1) {
            return 'k' . $matches[1];
        }
    }
}
