<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;


class DisambiguatorPrefixBeRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'be-'];
	}
	
    // fonem dasar be -> be - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^be([a-z].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
