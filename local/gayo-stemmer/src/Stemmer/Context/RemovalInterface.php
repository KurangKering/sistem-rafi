<?php

namespace KurangKering\GayoStemmer\Stemmer\Context;

interface RemovalInterface
{


    public function getSubject();

    public function getResult();

    public function getRemovedPart();

    public function getAffixType();
}
