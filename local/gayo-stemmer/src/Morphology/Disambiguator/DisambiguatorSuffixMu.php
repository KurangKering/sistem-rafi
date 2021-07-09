<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixMu extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-mu'];
	}

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)mu$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
