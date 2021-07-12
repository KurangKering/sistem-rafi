<?php

namespace KurangKering\GayoStemmerDev\Dictionary;

interface DictionaryInterface extends \Countable
{
    public function contains($word);
}
