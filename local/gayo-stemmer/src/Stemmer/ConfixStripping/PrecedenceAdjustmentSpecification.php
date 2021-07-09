<?php

namespace KurangKering\GayoStemmer\Stemmer\ConfixStripping;

use KurangKering\GayoStemmer\Specification\SpecificationInterface;

class PrecedenceAdjustmentSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($value)
    {
        $regexRules = array(
            '/^be(.*)lah$/',
            '/^be(.*)an$/',
            '/^me(.*)i$/',
            '/^di(.*)i$/',
            '/^pe(.*)i$/',
            '/^ter(.*)i$/',
        );

        foreach ($regexRules as $rule) {
            if (preg_match($rule, $value)) {
                return true;
            }
        }

        return false;
    }
}
