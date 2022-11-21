<?php
/**
 * @see https://slides.com/nastasichristian/php-love-enterprise#/5/7
 */
namespace 	Modules\Book\ValueObjects;
final class Isbn {
    private function __construct(public readonly string $value) {
    	$this->assertIsThirteenCharacters($this->value);
        $this->assertHasAValidFormat($this->value);
    }

    private function assertIsThirteenCharacters (string $value):void  {
        strlen($value) == 13 or throw InvalidIsbn::tooShort($value);
    }

    private function assertHasAValidFormat (string $value):void  {
        // ISBN specific rules
    }

    public function __toString ():string  {
        return $this->value;
    }

    public function equalsTo (Isbn $isbn):bool  {
        return $isbn->value === $this->value;
    }

    public static function fromString(string $isbn): Isbn  {
        return new Isbn($isbn);
    }
}