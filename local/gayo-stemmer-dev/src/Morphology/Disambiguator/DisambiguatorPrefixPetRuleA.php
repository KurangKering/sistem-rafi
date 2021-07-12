<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

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
            return $matches[1];
        }
    }
}
