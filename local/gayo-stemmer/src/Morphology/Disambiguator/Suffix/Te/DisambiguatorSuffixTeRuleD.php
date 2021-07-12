<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixTeRuleD extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-te'];
	}


    // penambahan fonem te -> kata dasar - [n]te
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*[aiueo])[m]te$/', $word, $matches);

        if ($contains === 1) {
            return 'p' . $matches[1];
        }
    }
}
