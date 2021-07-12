<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixPetRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'pet-'];
	}

    //fonem dasar pet -> pet - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pet(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
