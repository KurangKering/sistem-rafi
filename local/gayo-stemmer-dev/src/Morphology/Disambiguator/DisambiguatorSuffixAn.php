<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixAn extends AbstractDisambiguator implements DisambiguatorInterface
{

	public function setRule() 
	{
		$this->rule = ['suffix', '-an'];
	}

	
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)an$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
