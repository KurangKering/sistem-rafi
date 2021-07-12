<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;


class DisambiguatorInfixEnRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{

	public function setRule() 
	{
		$this->rule = ['infix', '-en-'];
	}
	
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])en([a-z].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1]. $matches[2];
        }
    }
}