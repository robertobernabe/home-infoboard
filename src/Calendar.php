<?php

declare(strict_types=1);

final class Calendar
{
    private $icalFile;

    public function __construct(string $icalFilePath)
    {
        $this->ensureIcalFileExists($icalFilePath);
        $this->email = $icalFilePath;
    }

    public static function fromString(string $filePath): self
    {
        return new self($filePath);
    }

    public function __toString(): string
    {
        return $this->email;
    }

    private function ensureIcalFileExists(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new \Exception(
                sprintf(
                    '"%s" does not exist',
                    $filePath
                )
            );
        }
    }
}
