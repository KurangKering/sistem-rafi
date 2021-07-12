<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixTeRuleB extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'te-'];
	}

    // penambahan fonem  te -> te[r] - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^te[r]([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
