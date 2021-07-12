<?php

namespace KurangKering\GayoStemmerDev\Stemmer\ConfixStripping;

use KurangKering\GayoStemmerDev\Specification\SpecificationInterface;

class PrecedenceAdjustmentSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($value)
    {
        $regexRules = array(
            '/^ber(.*)en$/',
        );

        foreach ($regexRules as $rule) {
            if (preg_match($rule, $value)) {
                return true;
            }
        }

        return false;
    }
}
