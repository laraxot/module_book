<?php
namespace Modules\Book\Actions;
/**
 * @see https://slides.com/nastasichristian/php-love-enterprise#/6/1
 */
final class AddBook
{
   public function __construct (
      private readonly BookRepository $bookRepository,
      private readonly EventDispatcher $dispatcher
   ) {}

   public function __invoke (Book $book): void
   {
      $this->bookRepository->add ($book);

      $this->dispatcher->dispatch (new BookAdded ($book));
   }
}