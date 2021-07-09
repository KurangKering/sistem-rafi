<?php

namespace KurangKering\GayoStemmer\Dictionary;

interface DictionaryInterface extends \Countable
{
    public function contains($word);
}
