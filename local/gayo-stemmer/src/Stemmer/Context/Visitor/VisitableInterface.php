<?php

namespace KurangKering\GayoStemmer\Stemmer\Context\Visitor;

interface VisitableInterface
{
    /**
     * @return void
     */
    public function accept(VisitorInterface $visitor);
}
