<?php
/**
 * @see https://slides.com/nastasichristian/php-love-enterprise#/5/8
 */
namespace Modules\Book\Entities;
final class Book {
    public function __construct (
       public readonly Isbn $isbn,
       public readonly Title $title,
       public readonly Authors $authors,
       public readonly PublishingDate $publishedAt
    ) {}

    public function equalsTo (Book $book):bool {
        return $book->isbn->equalsTo($this->isbn);
    }

    public static function create (
        string $isbn,
        string $title,
        array $authors,
        string $publishedAt
    ): Book {
        return new Book (
            Isbn::fromString($isbn),
            Title::fromString($title),
            Authors::fromArray($authors),
            PublishingDate::fromString($publishedAt)
        );
    }

    public function toArray ():array {
    	return [
           'isbn' => (string) $this->isbn,
           'title' => (string) $this->title,
           'authors' => $this->authors->toArray(),
           'publishAt' => (string) $this->publishedAt
        ];
    }
}