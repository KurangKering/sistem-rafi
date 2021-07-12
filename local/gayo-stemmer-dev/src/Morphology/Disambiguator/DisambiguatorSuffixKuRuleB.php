<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixKuRuleB extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-ku'];
	}

    // penambahan fonem ku -> kata dasar - [n]ku
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*[auieo])[n]ku$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
