<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixTeRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'te-'];
	}

    // fonem dasar te -> te - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^te([a-z].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
