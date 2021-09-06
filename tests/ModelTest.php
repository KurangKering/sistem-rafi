<?php 

use PHPUnit\Framework\TestCase;

use KurangKering\GayoStemmer\Stemmer\StemmerFactory;
use App\Models\DataUjiModel;
use App\Models\KataDasarModel;

class ModelTest extends TestCase
{

	public function testModelKataDasargetArti()
	{
		$model = new KataDasarModel();
		$input = 'entan';
		$arti = $model->getArti($input);
		var_dump ($arti);
		die();
	}
}