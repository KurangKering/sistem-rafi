<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;


class DisambiguatorPrefixIRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'i-'];
	}
	

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^i(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
