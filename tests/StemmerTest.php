<?php 

use PHPUnit\Framework\TestCase;

use KurangKering\GayoStemmer\Stemmer;
use App\Models\KataDasarModel;

class StemmerTest extends TestCase
{

	public function testStemmer()
	{
		$factory = new Stemmer\StemmerFactory();
		$stemmer = $factory->createStemmer();
		print_r($stemmer->stem('pecegah'));

		$this->assertSame('a', 'a');
	}

	public function testKamus()
	{
		$model = new KataDasarModel();
		$data = $model->getKamus();

	}

	public function testAwahen()
	{
		$kata_dasar_model = new KataDasarModel();
		$array_kata_dasar = $kata_dasar_model->getKamus();

		$factory = new Stemmer\StemmerFactory();
		$stemmer = $factory->createGayoStemmer($array_kata_dasar);

		$stem = $stemmer->detailStem('awahen');
		var_dump ($stem);
		die();

	}
}