<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixIRuleB extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-i'];
	}

    // penambahan fonem i -> kata dasar - V[w]i
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*[aiueo])[w]i$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
