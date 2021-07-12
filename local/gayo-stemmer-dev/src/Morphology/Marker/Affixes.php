<?php 

namespace KurangKering\GayoStemmerDev\Morphology\Marker;

class Affixes 
{

	public static function prefix($word) 
	{
		return new Prefix($word);
	}

	public static function suffix($word) 
	{
		return new Suffix($word);
	}

	public static function infix($word) 
	{
		return new Infix($word);
	}
}