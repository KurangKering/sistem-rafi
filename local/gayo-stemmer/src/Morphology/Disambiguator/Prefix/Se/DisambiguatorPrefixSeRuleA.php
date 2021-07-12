<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixSeRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{

	public function setRule() 
	{
		$this->rule = ['prefix', 'se-'];
	}

    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^se(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
