<?php

namespace KurangKering\GayoStemmerDev\Stemmer\Context\Visitor;

use KurangKering\GayoStemmerDev\Morphology\Disambiguator;

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
            array(
                new Disambiguator\DisambiguatorPrefixMuRuleA(),
                new Disambiguator\DisambiguatorPrefixMuRuleB(),
                new Disambiguator\DisambiguatorPrefixMuRuleC(),
                new Disambiguator\DisambiguatorPrefixMuRuleD(),
                new Disambiguator\DisambiguatorPrefixMuRuleE(),
                new Disambiguator\DisambiguatorPrefixMuRuleF(),
                new Disambiguator\DisambiguatorPrefixMuRuleG(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixPeRuleA(),
                new Disambiguator\DisambiguatorPrefixPeRuleB(),
                new Disambiguator\DisambiguatorPrefixPeRuleC(),
                new Disambiguator\DisambiguatorPrefixPeRuleD(),
                new Disambiguator\DisambiguatorPrefixPeRuleE(),
                new Disambiguator\DisambiguatorPrefixPeRuleF(),
                new Disambiguator\DisambiguatorPrefixPeRuleG(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixBersiRuleA(),
            )
        );   



        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixBeRuleA(),
                new Disambiguator\DisambiguatorPrefixBeRuleB(),
                new Disambiguator\DisambiguatorPrefixBeRuleC(),
                new Disambiguator\DisambiguatorPrefixBeRuleD(),
            )
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixKeRuleA(),
            )
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixTeRuleB(),
                new Disambiguator\DisambiguatorPrefixTeRuleA(),
            )
        );   

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixPetRuleA(),
                new Disambiguator\DisambiguatorPrefixPetRuleB(),
                new Disambiguator\DisambiguatorPrefixPetRuleC(),

            )
        );  

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixIRuleA(),
            )
        );   

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixKuRuleA(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorSuffixAn(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorPrefixSeRuleA(),
            )
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorSuffixEnRuleB(),
                new Disambiguator\DisambiguatorSuffixEnRuleA(),
            )
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorSuffixMiRuleA(),
            )
        );
        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorSuffixKeRuleA(),
                new Disambiguator\DisambiguatorSuffixNeRuleA(),
                new Disambiguator\DisambiguatorSuffixPeRuleA(),
                new Disambiguator\DisambiguatorSuffixTeRuleA(),
                new Disambiguator\DisambiguatorSuffixTeRuleB(),
                new Disambiguator\DisambiguatorSuffixTeRuleC(),
                new Disambiguator\DisambiguatorSuffixTeRuleD(),
                new Disambiguator\DisambiguatorSuffixTeRuleE(),
                new Disambiguator\DisambiguatorSuffixTeRuleF(),
                new Disambiguator\DisambiguatorSuffixERuleA(),
            )
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorSuffixIRuleB(),
                new Disambiguator\DisambiguatorSuffixIRuleA(),
            )
        );


        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorSuffixKuRuleA(),
                new Disambiguator\DisambiguatorSuffixKuRuleB(),
                new Disambiguator\DisambiguatorSuffixKuRuleC(),
                new Disambiguator\DisambiguatorSuffixKuRuleD(),
                new Disambiguator\DisambiguatorSuffixKuRuleE(),
                new Disambiguator\DisambiguatorSuffixKuRuleF(),
            )
        );

        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorSuffixMuRuleA(),
            )
        );



        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorSuffixLeRuleA(),
            )
        );




        
        $this->infixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorInfixEmRuleA(),
            )
        );

        $this->infixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorInfixEnRuleA(),
            )
        );


        $this->suffixVisitors[] = new PrefixDisambiguator(

            array(
                new Disambiguator\DisambiguatorSuffixARuleA(),
                new Disambiguator\DisambiguatorSuffixARuleB(),
            )
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
