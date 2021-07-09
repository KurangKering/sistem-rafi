<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixMu extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'mu-'];
	}

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mu(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
