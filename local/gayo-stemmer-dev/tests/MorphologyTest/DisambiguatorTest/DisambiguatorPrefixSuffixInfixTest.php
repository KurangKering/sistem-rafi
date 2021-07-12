<?php 

namespace MorphologyTest\DisambiguatorTest;

use KurangKering\GayoStemmerDev\Morphology\Disambiguator;
use PHPUnit\Framework\TestCase;


class DisambiguatorPrefixSuffixInfixTest extends TestCase
{

	public function testPrefixMu()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixMuRuleA();
		$this->assertSame($disambiguator->disambiguate('muneban'), 'neban');
	}

	public function testPrefixPe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixPeRuleA();
		$this->assertSame($disambiguator->disambiguate('pecegah'), 'cegah');
	}
	
	public function testPrefixBe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixBeRuleA();
		$this->assertSame($disambiguator->disambiguate('betulis'), 'tulis');
	}

	public function testPrefixKe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixKeRuleA();
		$this->assertSame($disambiguator->disambiguate('ketiga'), 'tiga');
	}

	public function testPrefixTe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixTeRuleA();
		$this->assertSame($disambiguator->disambiguate('terawen'), 'rawen');
	}

	public function testPrefixIPet()
	{
		$disambiguatorI = new Disambiguator\DisambiguatorPrefixIRuleA();
		$disambiguatorPet = new Disambiguator\DisambiguatorPrefixPetRuleA();

		$word = "ipetesah";

		$result = $disambiguatorI->disambiguate($word);
		$result = $disambiguatorPet->disambiguate($result);
		$this->assertSame($result, 'tesah');
	}

	public function testPrefixKu()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixKuRuleA();
		$this->assertSame($disambiguator->disambiguate('kubeli'), 'beli');
	}

	public function testPrefixI()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixIRuleA();
		$this->assertSame($disambiguator->disambiguate('iganti'), 'ganti');
	}

	public function testPrefixSe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixSeRuleA();
		$this->assertSame($disambiguator->disambiguate('senare'), 'nare');
	}

	public function testInfixEm()
	{
		$disambiguator = new Disambiguator\DisambiguatorInfixEmRuleA();
		$this->assertSame($disambiguator->disambiguate('temarin'), 'tarin');
	}

	public function testInfixEn()
	{
		$disambiguator = new Disambiguator\DisambiguatorInfixEnRuleA();
		$this->assertSame($disambiguator->disambiguate('tenarin'), 'tarin');
	}

	public function testSuffixEn()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixEnRuleA();
		$this->assertSame($disambiguator->disambiguate('anuten'), 'anut');
	}

	public function testSuffixI()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixIRuleA();
		$this->assertSame($disambiguator->disambiguate('manupaki'), 'manupak');
	}

	public function testSuffixE()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixERuleA();
		$this->assertSame($disambiguator->disambiguate('ijuele'), 'ijuel');
	}

	public function testSuffixKu()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixKuRuleA();
		$this->assertSame($disambiguator->disambiguate('umahku'), 'umah');
	}
	public function testSuffixMu()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixMuRuleA();
		$this->assertSame($disambiguator->disambiguate('amamu'), 'ama');
	}
	public function testSuffixTe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixTeRuleA();
		$this->assertSame($disambiguator->disambiguate('umahte'), 'umah');
	}
	public function testSuffixA()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixARuleA();
		$this->assertSame($disambiguator->disambiguate('bukua'), 'buku');
	}
	public function testSuffixKe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixKeRuleA();
		$this->assertSame($disambiguator->disambiguate('arake'), 'ara');
	}
	public function testSuffixLe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixLeRuleA();
		$this->assertSame($disambiguator->disambiguate('kinile'), 'kini');
	}
	public function testSuffixMi()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixMiRuleA();
		$this->assertSame($disambiguator->disambiguate('tulismi'), 'tulis');
	}
	public function testSuffixPe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixPeRuleA();
		$this->assertSame($disambiguator->disambiguate('akupe'), 'aku');
	}
	public function testSuffixNe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixNeRuleA();
		$this->assertSame($disambiguator->disambiguate('kelamne'), 'kelam');
	}

	


}