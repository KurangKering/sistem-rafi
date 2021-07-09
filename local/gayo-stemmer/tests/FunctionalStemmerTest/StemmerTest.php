<?php 
namespace FunctionalStemmerTest;

use PHPUnit\Framework\TestCase;

use KurangKering\GayoStemmer\Stemmer;

use Tightenco\Collect\Support\Collection;

class StemmerTest extends TestCase
{
	
	public function testStemmer() 
	{
		$factory = new Stemmer\StemmerFactory();
		$stemmer = $factory->createStemmer();


	}

	public function testDatabase()
	{
		$model = new DataUjiModel();
		$data_uji = $model->findAll();
		$collection = new Collection($data_uji);
		$array_data_uji = $collection->pluck('kata')->all();
		var_dump ($array_data_uji);
		die();		

	}


}