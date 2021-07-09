<?php

namespace KurangKering\GayoStemmer\Stemmer\Cache;

class ArrayCache implements CacheInterface
{
    protected $data = array();

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
    }

    public function has($key)
    {
        return isset($this->data[$key]);
    }
}
