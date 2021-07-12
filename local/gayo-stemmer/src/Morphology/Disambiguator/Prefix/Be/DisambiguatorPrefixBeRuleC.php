<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;


class DisambiguatorPrefixBeRuleC extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'be-'];
	}
	
    // penambahan fonem be -> be[r] - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^be[r]([wn].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
