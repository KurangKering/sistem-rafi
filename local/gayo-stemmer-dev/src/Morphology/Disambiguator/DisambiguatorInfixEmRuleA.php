<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;


class DisambiguatorInfixEmRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{

	public function setRule() 
	{
		$this->rule = ['infix', '-em-'];
	}
	
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])em(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1]. $matches[2];
        }
    }
}
