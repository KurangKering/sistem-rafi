<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixPeRuleB extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'pe-'];
	}

    // penambahan fonem pe -> pe[n] - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pe[n]([ptskaiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
