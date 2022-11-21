<?php
namespace Modules\Book\Http\Controllers;
/**
 * @see https://slides.com/nastasichristian/php-love-enterprise#/6/3
 */

class AddBookController {
   public function __construct (private readonly AddBook $addBook) {}

   public function __invoke (AddBookRequest $request): JsonResponse
   {
      $book = Book::create(...$request->validated()); // It's our entity

      ($this->addBook)($book);

      return response()->json($book->toArray(), 201)
   }
}