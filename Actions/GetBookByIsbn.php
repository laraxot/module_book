<?php
namespace Modules\Book\Actions;

final class GetBookByIsbn {
   public function __construct (
      private readonly BookRepository $bookRepository
   ) {}

   public function __invoke (Isbn $isbn): Book|never
   {
      $book = $this->bookRepository->findByIsbn ($isbn);

      return $book ?? throw new BookNotFound ($isbn);
   }
}