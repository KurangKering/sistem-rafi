<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorPrefixMuRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['prefix', 'mu-'];
	}

    // fonem dasar mu - kata dasar
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mu([a-z].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
