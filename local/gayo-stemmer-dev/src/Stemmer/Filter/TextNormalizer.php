<?php

namespace KurangKering\GayoStemmerDev\Stemmer\Filter;

class TextNormalizer
{
    public static function normalizeText($text)
    {
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9 -]/im', ' ', $text);
        $text = preg_replace('/( +)/im', ' ', $text);

        return trim($text);
    }
}
