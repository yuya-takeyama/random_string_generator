<?php
class RandomStringGenerator_StringRepository implements Countable
{
    private $strings;

    private $count;

    public function __construct()
    {
        $this->strings = array();
        $this->count   = 0;
    }

    public function has($str)
    {
        return isset($this->strings[$str]);
    }

    public function set($str)
    {
        if (isset($this->strings[$str])) {
            throw new RuntimeException('Duplicated string is set: '. $str);
        }

        $this->strings[$str] = true;
        $this->count++;
    }

    public function count()
    {
        return $this->count;
    }
}
