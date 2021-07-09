<?php

namespace KurangKering\GayoStemmer\Stemmer\Context;

interface ContextInterface
{
    public function getOriginalWord();

    public function setCurrentWord($word);

    public function getCurrentWord();

    public function getDictionary();

    public function stopProcess();

    public function processIsStopped();

    public function addRemoval(RemovalInterface $removal);

    public function getRemovals();
}
