<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixA extends AbstractDisambiguator implements DisambiguatorInterface
{

	public function setRule() 
	{
		$this->rule = ['suffix', '-a'];
	}

	
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)a$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
