<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;


class DisambiguatorPrefixKeRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'ke-'];
	}
	

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ke(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
