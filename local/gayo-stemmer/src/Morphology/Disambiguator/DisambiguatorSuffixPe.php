<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixPe extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-pe'];
	}

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)pe$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
