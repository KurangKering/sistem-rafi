<?php

namespace KurangKering\GayoStemmer\Stemmer\Context\Visitor;

use KurangKering\GayoStemmer\Stemmer\Context\ContextInterface;
use KurangKering\GayoStemmer\Stemmer\Context\Removal;
use KurangKering\GayoStemmer\Morphology\Disambiguator\DisambiguatorInterface;

abstract class AbstractDisambiguatePrefixRule implements VisitorInterface
{
    protected $disambiguators = array();

    protected $current_disambiguator = null;


    public function visit(ContextInterface $context)
    {
        $result = null;
        foreach ($this->disambiguators as $disambiguator) {
            $result = $disambiguator->disambiguate($context->getCurrentWord());
            $this->current_disambiguator = $disambiguator;

            if ($context->getDictionary()->contains($result)) {
                break;
            }
        }

        if ($result === null) {
            return;
        }

        $removedPart = preg_replace("/$result/", '', $context->getCurrentWord(), 1);

        $removal = new Removal(
            $context->getCurrentWord(),
            $result,
            $removedPart,
            $this->current_disambiguator->getRule(),
        );

        $context->addRemoval($removal);
        $context->setCurrentWord($result);
    }



    public function getRule()
    {
        return $this->current_disambiguator->getRule();
    }
    public function addDisambiguators(array $disambiguators)
    {
        foreach ($disambiguators as $disambiguator) {
            $this->addDisambiguator($disambiguator);
        }
    }

    public function addDisambiguator(DisambiguatorInterface $disambiguator)
    {
        $this->disambiguators[] = $disambiguator;
    }
}
