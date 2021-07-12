<?php

namespace KurangKering\GayoStemmerDev\Stemmer\Context\Visitor;

use KurangKering\GayoStemmerDev\Stemmer\Context\ContextInterface;

interface VisitorInterface
{
    /**
     * @return void
     */
    public function visit(ContextInterface $context);
}
