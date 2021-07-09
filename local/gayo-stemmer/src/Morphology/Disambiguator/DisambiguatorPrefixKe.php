<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixKe extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'ke-'];
	}
	

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ke(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
