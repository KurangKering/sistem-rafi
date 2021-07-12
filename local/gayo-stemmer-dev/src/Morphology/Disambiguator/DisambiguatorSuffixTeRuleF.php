<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixTeRuleF extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-te'];
	}


    // penambahan fonem te -> kata dasar - [n]te
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*[aiueo])[n]te$/', $word, $matches);

        if ($contains === 1) {
            return 'k' . $matches[1];
        }
    }
}
