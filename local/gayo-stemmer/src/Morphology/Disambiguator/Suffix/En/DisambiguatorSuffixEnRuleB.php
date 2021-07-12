<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixEnRuleB extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-en'];
	}

    // pengurangan fonem en -> kata dasar - Vn
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*[aiueo])n$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
