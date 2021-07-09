<?php

namespace KurangKering\GayoStemmer\Stemmer\Context\Visitor;

use KurangKering\GayoStemmer\Stemmer\Context\ContextInterface;

interface VisitorInterface
{
    /**
     * @return void
     */
    public function visit(ContextInterface $context);
}
