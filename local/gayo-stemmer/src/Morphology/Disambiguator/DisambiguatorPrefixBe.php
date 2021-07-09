<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;


class DisambiguatorPrefixBe extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'be-'];
	}
	
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^be(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
