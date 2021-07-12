<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixEnRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-en'];
	}

    // fonem dasar en -> kata dasar - en
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)en$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
