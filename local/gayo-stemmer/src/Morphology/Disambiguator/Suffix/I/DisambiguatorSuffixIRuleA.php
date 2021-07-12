<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixIRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-i'];
	}

    // fonem dasar i -> kata dasar - i
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)i$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
