<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixKuRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{

	public function setRule() 
	{
		$this->rule = ['prefix', 'ku-'];
	}
	
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ku(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
