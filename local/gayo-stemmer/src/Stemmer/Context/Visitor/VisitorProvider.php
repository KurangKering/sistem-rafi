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
            new Disambiguator\DisambiguatorPrefixMu()
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixPe()
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixBersi()
        );   

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixBeR()
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixBe()
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixKe()
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixTe()
        );   

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixPet()
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixI()
        );   

        $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorPrefixKu()
        );

          $this->prefixVisitors[] = new PrefixDisambiguator(
            new Disambiguator\DisambiguatorSuffixAn()
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorPrefixSe(),
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixEn(),
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixMi(),
        );
        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixI(),
        );


        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixKu(),
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixMu(),
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixTe(),
        );


        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixKe(),
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixLe(),
        );



        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixPe(),
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixNe(),
        );

        $this->infixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorInfixEm(),
        );

        $this->infixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorInfixEn(),
        );
        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixE(),
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            new Disambiguator\DisambiguatorSuffixA(),
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
