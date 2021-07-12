<?php

namespace KurangKering\GayoStemmer\Morphology\Disambiguator;
use KurangKering\GayoStemmer\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixTeRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-te'];
	}

    // fonem dasar te -> kata dasar - te
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*[a-z])te$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
