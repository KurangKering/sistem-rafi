<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixNe extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-ne'];
	}

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)ne$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
