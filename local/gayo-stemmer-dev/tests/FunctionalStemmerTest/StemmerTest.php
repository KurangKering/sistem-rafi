<?php 
namespace FunctionalStemmerTest;

use PHPUnit\Framework\TestCase;

use KurangKering\GayoStemmerDev\Stemmer;

use Tightenco\Collect\Support\Collection;

class StemmerTest extends TestCase
{
	
	public function testStemmer() 
	{
		$factory = new Stemmer\StemmerFactory();
		$stemmer = $factory->createStemmer();


	}


}