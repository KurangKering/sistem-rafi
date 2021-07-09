<?php 

namespace MorphologyTest\DisambiguatorTest;

use KurangKering\GayoStemmer\Morphology\Disambiguator;
use PHPUnit\Framework\TestCase;


class DisambiguatorPrefixSuffixInfixTest extends TestCase
{

	public function testPrefixMu()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixMu();
		$this->assertSame($disambiguator->disambiguate('muneban'), 'neban');
	}

	public function testPrefixPe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixPe();
		$this->assertSame($disambiguator->disambiguate('pecegah'), 'cegah');
	}
	
	public function testPrefixBe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixBe();
		$this->assertSame($disambiguator->disambiguate('betulis'), 'tulis');
	}

	public function testPrefixKe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixKe();
		$this->assertSame($disambiguator->disambiguate('ketiga'), 'tiga');
	}

	public function testPrefixTe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixTe();
		$this->assertSame($disambiguator->disambiguate('terawen'), 'rawen');
	}

	public function testPrefixIPet()
	{
		$disambiguatorI = new Disambiguator\DisambiguatorPrefixI();
		$disambiguatorPet = new Disambiguator\DisambiguatorPrefixPet();

		$word = "ipetesah";

		$result = $disambiguatorI->disambiguate($word);
		$result = $disambiguatorPet->disambiguate($result);
		$this->assertSame($result, 'tesah');
	}

	public function testPrefixKu()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixKu();
		$this->assertSame($disambiguator->disambiguate('kubeli'), 'beli');
	}

	public function testPrefixI()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixI();
		$this->assertSame($disambiguator->disambiguate('iganti'), 'ganti');
	}

	public function testPrefixSe()
	{
		$disambiguator = new Disambiguator\DisambiguatorPrefixSe();
		$this->assertSame($disambiguator->disambiguate('senare'), 'nare');
	}

	public function testInfixEm()
	{
		$disambiguator = new Disambiguator\DisambiguatorInfixEm();
		$this->assertSame($disambiguator->disambiguate('temarin'), 'tarin');
	}

	public function testInfixEn()
	{
		$disambiguator = new Disambiguator\DisambiguatorInfixEn();
		$this->assertSame($disambiguator->disambiguate('tenarin'), 'tarin');
	}

	public function testSuffixEn()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixEn();
		$this->assertSame($disambiguator->disambiguate('anuten'), 'anut');
	}

	public function testSuffixI()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixI();
		$this->assertSame($disambiguator->disambiguate('manupaki'), 'manupak');
	}

	public function testSuffixE()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixE();
		$this->assertSame($disambiguator->disambiguate('ijuele'), 'ijuel');
	}

	public function testSuffixKu()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixKu();
		$this->assertSame($disambiguator->disambiguate('umahku'), 'umah');
	}
	public function testSuffixMu()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixMu();
		$this->assertSame($disambiguator->disambiguate('amamu'), 'ama');
	}
	public function testSuffixTe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixTe();
		$this->assertSame($disambiguator->disambiguate('umahte'), 'umah');
	}
	public function testSuffixA()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixA();
		$this->assertSame($disambiguator->disambiguate('bukua'), 'buku');
	}
	public function testSuffixKe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixKe();
		$this->assertSame($disambiguator->disambiguate('arake'), 'ara');
	}
	public function testSuffixLe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixLe();
		$this->assertSame($disambiguator->disambiguate('kinile'), 'kini');
	}
	public function testSuffixMi()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixMi();
		$this->assertSame($disambiguator->disambiguate('tulismi'), 'tulis');
	}
	public function testSuffixPe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixPe();
		$this->assertSame($disambiguator->disambiguate('akupe'), 'aku');
	}
	public function testSuffixNe()
	{
		$disambiguator = new Disambiguator\DisambiguatorSuffixNe();
		$this->assertSame($disambiguator->disambiguate('kelamne'), 'kelam');
	}

	


}