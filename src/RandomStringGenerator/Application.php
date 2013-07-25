<?php
class RandomStringGenerator_Application
{
    const STATUS_OK    = 0;
    const STATUS_ERROR = 1;

    private $stringCount;

    private $allowedErrorCount;

    private $randomStringGenerator;

    private $stringRepository;

    private $handler;

    public function __construct(
        $stringCount,
        $allowedErrorCount,
        RandomStringGenerator_RandomStringGeneratorInterface $randomStringGenerator,
        RandomStringGenerator_StringRepository               $stringRepository,
        RandomStringGenerator_HandlerInterface               $handler
    )
    {
        $this->stringCount           = $stringCount;
        $this->allowedErrorCount     = $allowedErrorCount;
        $this->randomStringGenerator = $randomStringGenerator;
        $this->stringRepository      = $stringRepository;
        $this->handler               = $handler;
    }

    public function run()
    {
        $errorCount = 0;

        try {
            while ($this->stringRepository->count() < $this->stringCount) {
                if ($errorCount > $this->allowedErrorCount) {
                    throw new RuntimeException('Reached at allowed error count');
                }

                $str = $this->randomStringGenerator->generateString();

                if ($this->stringRepository->has($str)) {
                    $errorCount++;
                } else {
                    $this->stringRepository->set($str);

                    $this->handler->handle($str);
                }
            }

            echo "Generated {$this->stringCount} strings successfully", PHP_EOL;

            return self::STATUS_OK;
        }
        catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;

            return self::STATUS_ERROR;
        }
    }
}
