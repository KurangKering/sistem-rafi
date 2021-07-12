<?php 

namespace KurangKering\GayoStemmerDev\Morphology\Disambiguator;

abstract class AbstractDisambiguator implements DisambiguatorInterface
{
	public function __construct()
	{
		$this->setRule();		
	}
	public function getRule()
	{
		return $this->rule;
	}

	abstract public function setRule();
}