<?php

namespace KurangKering\GayoStemmerDev\Stemmer\Context;

class Removal implements RemovalInterface
{

    protected $subject;

    protected $result;

    protected $removedPart;

    protected $affixType;

    public function __construct(
        $subject,
        $result,
        $removedPart,
        $affixType
    ) {
        $this->subject = $subject;
        $this->result  = $result;
        $this->removedPart = $removedPart;
        $this->affixType = $affixType;
    }


    public function getSubject()
    {
        return $this->subject;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getRemovedPart()
    {
        return $this->removedPart;
    }

    public function getAffixType()
    {
        return $this->affixType;
    }
}
