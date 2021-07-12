<?php

namespace KurangKering\GayoStemmerDev\Stemmer\Cache;

interface CacheInterface
{
    public function has($key);

    public function set($key, $value);

    public function get($key);
}
