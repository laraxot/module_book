<?php

declare(strict_types=1);


namespace Modules\Book\ValueObjects;

// ...

final class Title {
    public const MIN_LENGTH = 5;
    public const MAX_LENGTH = 100;

    /**
     * @var string
     */
    private $value;

    /**
     * @throws InvalidTitle
     */
    public function __construct(string $value)
    {
        $value = \trim($value);
        $length = \mb_strlen($value);

        if ($length < self::MIN_LENGTH) {
            throw new TitleTooShort($value);
        }

        if ($length >= self::MAX_LENGTH) {
            throw new TitleTooLong($value);
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(self $title): bool
    {
        return $this->value === (string)$title;
    }

    private function __clone()
    {
    }
}