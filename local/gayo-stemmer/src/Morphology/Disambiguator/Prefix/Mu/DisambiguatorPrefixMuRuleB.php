<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixMuRuleB extends AbstractDisambiguator implements DisambiguatorInterface
{
    public function setRule() 
    {
        $this->rule = ['prefix', 'mu-'];
    }

    // penambahan fonem mu -> mu[n] : mu[n] - awasi -> awas
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mu[n]([aiueopbtsck].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
