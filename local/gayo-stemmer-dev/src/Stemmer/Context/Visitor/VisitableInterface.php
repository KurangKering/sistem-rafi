<?php

namespace KurangKering\GayoStemmerDev\Stemmer\Context\Visitor;

interface VisitableInterface
{
    /**
     * @return void
     */
    public function accept(VisitorInterface $visitor);
}
