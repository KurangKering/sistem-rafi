<?php

namespace KurangKering\GayoStemmerDev\Morphology;

use KurangKering\GayoStemmerDev\Specification\SpecificationInterface;

class InvalidAffixPairSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($word)
    {
        if (preg_match('/^me(.*)kan$/', $word) === 1) {
            return false;
        }

        if ($word == 'ketahui') {
            return false;
        }

        $invalidAffixes = array(
            '/^ber(.*)i$/',
            '/^di(.*)an$/',
            '/^ke(.*)i$/',
            '/^ke(.*)an$/',
            '/^me(.*)an$/',
            '/^me(.*)an$/',
            '/^ter(.*)an$/',
            '/^per(.*)an$/',
        );

        $contains = false;

        foreach ($invalidAffixes as $invalidAffix) {
            $contains = $contains || preg_match($invalidAffix, $word) === 1;
        }

        return $contains;
    }
}
