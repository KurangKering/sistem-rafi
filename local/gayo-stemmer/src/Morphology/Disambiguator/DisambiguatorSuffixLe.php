<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixLe extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-le'];
	}

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)le$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
