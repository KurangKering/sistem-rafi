<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixPetRuleB extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'pet-'];
	}

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pet(.*)$/', $word, $matches);

        if ($contains === 1) {
            return 't' . $matches[1];
        }
    }
}
