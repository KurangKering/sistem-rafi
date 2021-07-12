<?php

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use KurangKering\GayoStemmerDev\Morphology\Disambiguator\AbstractDisambiguator;

class DisambiguatorSuffixARuleB extends AbstractDisambiguator implements DisambiguatorInterface
{

	public function setRule() 
	{
		$this->rule = ['suffix', '-a'];
	}

	// penambahan fonem  a -> kata dasar - a[w]a
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^(.*a)[w]a$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
