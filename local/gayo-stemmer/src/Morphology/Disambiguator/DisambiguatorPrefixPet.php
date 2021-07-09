<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixPet extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'pet-'];
	}

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pe([t])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
