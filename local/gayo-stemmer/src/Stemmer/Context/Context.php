<?php

namespace KurangKering\GayoStemmer\Stemmer\Context;

use KurangKering\GayoStemmer\Dictionary\DictionaryInterface;
use KurangKering\GayoStemmer\Stemmer\Context\Visitor\VisitorInterface;
use KurangKering\GayoStemmer\Stemmer\Context\Visitor\VisitableInterface;
use KurangKering\GayoStemmer\Stemmer\ConfixStripping;

class Context implements ContextInterface, VisitableInterface
{
    protected $originalWord;

    protected $currentWord;

    protected $processIsStopped = false;

    protected $removals = array();

    
    protected $dictionary;

    protected $visitorProvider;


    protected $infixVisitors = array();
    protected $suffixVisitors = array();

    protected $prefixVisitors = array();

    protected $result;

    protected $isFound = false;

    public function __construct(
        $originalWord,
        DictionaryInterface $dictionary,
        Visitor\VisitorProvider $visitorProvider
    ) {
        $this->originalWord = $originalWord;
        $this->currentWord  = $this->originalWord;
        $this->dictionary   = $dictionary;
        $this->visitorProvider = $visitorProvider;

        $this->initVisitors();
    }

    protected function initVisitors()
    {
        $this->infixVisitors = $this->visitorProvider->getInfixVisitors();
        $this->prefixVisitors = $this->visitorProvider->getPrefixVisitors();
        $this->suffixVisitors = $this->visitorProvider->getSuffixVisitors();
    }

    public function setDictionary(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function getDictionary()
    {
        return $this->dictionary;
    }

    public function getOriginalWord()
    {
        return $this->originalWord;
    }

    public function setCurrentWord($word)
    {
        $this->currentWord = $word;
    }

    public function getCurrentWord()
    {
        return $this->currentWord;
    }

    public function stopProcess()
    {
        $this->processIsStopped = true;
    }

    public function processIsStopped()
    {
        return $this->processIsStopped;
    }

    public function addRemoval(RemovalInterface $removal)
    {
        $this->removals[] = $removal;
    }

    public function getRemovals()
    {
        return $this->removals;
    }

    public function getResult()
    {
        return $this->result;
    }
    
    public function getResultDetail()
    {
        $rules = [];

        foreach ($this->getRemovals() as $k => $rule) {
            $rules[$k]['subject'] = $rule->getSubject();
            $rules[$k]['result'] = $rule->getResult();
            $rules[$k]['removedPart'] = $rule->getRemovedPart();
            $rules[$k]['affixType'] = $rule->getAffixType();
        }

        return array('input' => $this->getOriginalWord(), 'ketemu' => $this->isFound, 'hasil' => $this->result, 'rules' => $rules );
    }



    public function execute()
    {
        // step 1 - 5
        $this->startStemmingProcess();

        // step 6
        if ($this->dictionary->contains($this->getCurrentWord())) {
            $this->isFound = true;
            $this->result = $this->getCurrentWord();
        } else {
            $this->result = $this->originalWord;
        }
    }

    protected function startStemmingProcess()
    {
        // step 1
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // step 2, 3
        $this->removeSuffixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // step 4, 5
        $this->removePrefixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // step 6,7
        $this->removeInfixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        $this->removals = [];
        $this->currentWord = $this->originalWord;

// step 2, 3
        

        // step 4, 5
        $this->removePrefixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        $this->removeSuffixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // step 6,7
        $this->removeInfixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        $this->removals = [];
        $this->currentWord = $this->originalWord;

// step 2, 3
         // step 6,7
        $this->removeInfixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // step 4, 5
        $this->removePrefixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        $this->removeSuffixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        
    }

    protected function removePrefixes()
    {

        $this->acceptVisitors($this->prefixVisitors);

    }

    protected function removeInfixes()
    {

        $this->acceptVisitors($this->infixVisitors);

    }

    protected function removeSuffixes()
    {
        $this->acceptVisitors($this->suffixVisitors);
    }

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visit($this);
    }

    protected function acceptVisitors(array $visitors)
    {
        foreach ($visitors as $visitor) {
            $this->accept($visitor);

            if ($this->getDictionary()->contains($this->getCurrentWord())) {
                return $this->getCurrentWord();
            }

            if ($this->processIsStopped()) {
                return $this->getCurrentWord();
            }
        }
    }

}
