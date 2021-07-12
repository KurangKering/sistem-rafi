<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixMuRuleC extends AbstractDisambiguator implements DisambiguatorInterface
{
    public function setRule() 
    {
        $this->rule = ['prefix', 'mu-'];
    }

    // pengurangan fonem mu -> mu[n] : mu[n] - ulis -> tulis
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mu[n]([aiueopbtsck].*)$/', $word, $matches);

        if ($contains === 1) {
            return 't' . $matches[1];
        }
    }
}
