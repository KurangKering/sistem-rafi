<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixMuRuleD extends AbstractDisambiguator implements DisambiguatorInterface
{
    public function setRule() 
    {
        $this->rule = ['prefix', 'mu-'];
    }

    // pengurangan fonem mu -> m - kata dasar
    public function disambiguate($word)
    {

        $matches  = null;
        $contains = preg_match('/^m([aiueo][cny].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }

    private function words()
    {
        return array (
            'manut',
            'menet',
            'meye',
            'micin',
            'mences',
            'munus',
            'manas',
        );
    }
}
