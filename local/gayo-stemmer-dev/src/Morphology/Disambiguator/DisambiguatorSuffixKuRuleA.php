<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixKuRuleA extends AbstractDisambiguator implements DisambiguatorInterface
{
	public function setRule() 
	{
		$this->rule = ['suffix', '-ku'];
	}

    // fonem dasar ku : kata dasar - ku
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*)ku$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
