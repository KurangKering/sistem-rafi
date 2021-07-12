<?php

namespace KurangKering\GayoStemmer\Stemmer\Context\Visitor;

use KurangKering\GayoStemmer\Morphology\Disambiguator;

class VisitorProvider
{

    protected $infixVisitors = array();

    protected $suffixVisitors = array();

    protected $prefixVisitors = array();

    public function __construct()
    {
        $this->initVisitors();
    }

    protected function initVisitors()
    {

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixMu())
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixPe())
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixBersi())
        );   

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixBeR())
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixBe())
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixKe())
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixTe())
        );   

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixPet())
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixI())
        );   

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorPrefixKu())
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(new Disambiguator\DisambiguatorSuffixAn())
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorPrefixSe())
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixEn())
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixMi())
        );
        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixI())
        );


        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixKu())
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixMu())
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixTe())
        );


        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixKe())
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixLe())
        );



        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixPe())
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixNe())
        );

        $this->infixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorInfixEm())
        );

        $this->infixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorInfixEn())
        );
        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixE())
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(new Disambiguator\DisambiguatorSuffixA())
        );

        
    }


    public function getSuffixVisitors()
    {
        return $this->suffixVisitors;
    }

    public function getPrefixVisitors()
    {
        return $this->prefixVisitors;
    }

    public function getInfixVisitors()
    {
        return $this->infixVisitors;
    }
}
