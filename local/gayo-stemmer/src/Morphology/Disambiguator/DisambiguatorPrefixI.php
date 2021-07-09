<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixI extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'i-'];
	}
	

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^i(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
