<?php


namespace KurangKering\GayoStemmerDev\Specification;

interface SpecificationInterface
{
    /**
     * @return boolean
     */
    public function isSatisfiedBy($value);
}
