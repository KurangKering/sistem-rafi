<?php 

use PHPUnit\Framework\TestCase;

use KurangKering\GayoStemmer\Stemmer\StemmerFactory;
use App\Models\DataUjiModel;
class ControllerTest extends TestCase
{

	public function stestStemmer()
	{
		$factory = new StemmerFactory();
		$stemmer = $factory->createStemmer();
		print_r($stemmer->stem('pecegah'));

		$this->assertSame('a', 'a');
	}

	public function testModel()
	{
		$model = new DataUjiModel();
		$get_data = $model->getTotalDataTelahDiuji();
		var_dump ($get_data);
		die();

	}
}