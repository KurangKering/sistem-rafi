<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;


class DisambiguatorPrefixBeRuleB extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'be-'];
	}
	
    // penambahan fonem be -> be[r] - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^be[r]([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
