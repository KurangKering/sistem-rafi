<?php

namespace KurangKering\GayoStemmer\Stemmer\Context\Visitor;

use KurangKering\GayoStemmer\Stemmer\Context\ContextInterface;
use KurangKering\GayoStemmer\Stemmer\Context\Removal;
use KurangKering\GayoStemmer\Morphology\Disambiguator\DisambiguatorInterface;

abstract class AbstractDisambiguatePrefixRule implements VisitorInterface
{
    protected $disambiguators = array();

    public function visit(ContextInterface $context)
    {
        $result = null;

        $result = $this->disambiguator->disambiguate($context->getCurrentWord());

        if ($result === null) {
            return;
        }

        $removedPart = preg_replace("/$result/", '', $context->getCurrentWord(), 1);

        $removal = new Removal(
            $context->getCurrentWord(),
            $result,
            $removedPart,
            $this->disambiguator->getRule(),
        );

        $context->addRemoval($removal);
        $context->setCurrentWord($result);
    }

   

    public function addDisambiguator(DisambiguatorInterface $disambiguator)
    {
        $this->disambiguator = $disambiguator;
    }

    public function getRule()
    {
        return $this->disambiguator->getRule();
    }
}
