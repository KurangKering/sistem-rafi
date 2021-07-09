<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixBersi extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'bersi-'];
	}
	

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^bersi(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
