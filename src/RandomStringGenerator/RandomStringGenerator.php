<?php
class RandomStringGenerator_RandomStringGenerator implements RandomStringGenerator_RandomStringGeneratorInterface
{
    private $characters;

    private $stringLength;

    public function __construct($characters, $stringLength)
    {
        $this->characters   = $characters;
        $this->stringLength = $stringLength;
    }

    public function generateString()
    {
        $str    = '';
        $maxPos = strlen($this->characters) - 1;

        for ($i = 0; $i < $this->stringLength; $i++) {
            $pos  = rand(0, $maxPos);
            $str .= $this->characters[$pos];
        }

        return $str;
    }
}
