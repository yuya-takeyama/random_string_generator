<?php
class RandomStringGenerator_Handler_FileOutputHandler
    implements RandomStringGenerator_HandlerInterface
{
    private $file;

    private $fp;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function handle($str)
    {
        fputs($this->getFp(), $str . "\n");
    }

    private function getFp()
    {
        if (empty($this->fp)) {
            $this->fp = fopen($this->file, 'w');
        }

        return $this->fp;
    }
}
