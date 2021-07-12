<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixPeRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'pe-'];
	}

    // fonem dasar pe - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pe([a-z].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
