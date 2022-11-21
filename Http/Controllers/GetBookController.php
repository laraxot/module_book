<?php
namespace Modules\Book\Http\Controllers;

use Illuminate\Http\JsonResponse;
/**
 * @see https://slides.com/nastasichristian/php-love-enterprise#/6/6
 */
class GetBookController {
   public function __construct (
      private readonly GetBookByIsbn $getBookByIsbn
   ) {}

   public function __invoke (string $isbnAsString): JsonResponse
   {
      $isbn = Isbn::fromString ($isbnAsString);

      $book = ($this->getBookByIsbn)($isbn); // Throws BookNotFound

      return response()->json($book->toArray(), 200);
   }
}